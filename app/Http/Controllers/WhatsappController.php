<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\tamuModel;
use App\Models\deptModel;

class WhatsappController extends Controller
{
    protected $twilio;
    protected $twilioWhatsAppNumber;
    protected $twilioSMSNumber;

    public function __construct()
    {
        $twilioSid = getenv("TWILIO_SID");
        $twilioToken = getenv("TWILIO_AUTH_TOKEN");
        $this->twilioWhatsAppNumber = getenv('TWILIO_WHATSAPP_NUMBER');
        $this->twilioSMSNumber = getenv('TWILIO_SMS_NUMBER');
        $this->twilio = new Client($twilioSid, $twilioToken);
    }

    public function sendWhatsAppMessage()
    {

        $nama = $_POST["nama"];
        $notelp = ltrim($_POST["notelp"], 0);
        $dept = $_POST["dept"];
        $tujuan = $_POST["tujuan"];
        $jadwal = $_POST["jadwal"];
        $sendto = $_POST["sendto"];

        if ($sendto == 0) {

            $message = $this->twilio->messages
                ->create(
                    "whatsapp:+62" . $notelp,
                    // to
                    array(
                        "from" => $this->twilioWhatsAppNumber,
                        "body" => "Permintaan kunjungan anda telah kami terima, mohon menunggu konfirmasi dari admin",
                    )
                );
        } elseif ($sendto == 1) {

            $message = $this->twilio->messages
                ->create(
                    "+62" . $notelp,
                    // to
                    array(
                        "from" => $this->twilioSMSNumber,
                        "body" => "Permintaan kunjungan anda telah kami terima, mohon menunggu konfirmasi dari admin",
                    )
                );


        }
        tamuModel::create([
            'nama' => $nama,
            'notelp' => "0" . $notelp,
            'id_departement' => $dept,
            'tujuan' => $tujuan,
            'jadwal' => $jadwal,
            'sendTo' => $sendto,
            'status' => 0,
        ]);

    }


    public function updateStatus($id_tamu, $newStatus)
    {
        $tamu = tamuModel::find($id_tamu);
        $notelp = ltrim($tamu->notelp, 0);
        $sendTo = $tamu->sendTo;
        $alasan = request('alasan');

        if ($sendTo == 0) {
            if ($newStatus == 1) {

                $message = $this->twilio->messages
                    ->create(
                        "whatsapp:+62" . $notelp,
                        // to
                        array(
                            "from" => $this->twilioWhatsAppNumber,
                            "body" => "Permintaan kunjungan anda telah disetujui, silahkan berkunjung",
                        )
                    );

            } elseif ($newStatus == 2) {
                $message = $this->twilio->messages
                    ->create(
                        "whatsapp:+62" . $notelp,
                        // to
                        array(
                            "from" => $this->twilioWhatsAppNumber,
                            "body" => "Mohon Maaf, Permintaan kunjungan anda ditolak, dengan alasan: " . $alasan,
                        )
                    );
            }

        } elseif ($sendTo == 1) {
            if ($newStatus == 1) {

                $message = $this->twilio->messages
                    ->create(
                        "+62" . $notelp,
                        // to
                        array(
                            "from" => $this->twilioSMSNumber,
                            "body" => "Permintaan kunjungan anda telah disetujui, silahkan berkunjung",
                        )
                    );
            } elseif ($newStatus == 2) {

                $message = $this->twilio->messages
                    ->create(
                        "+62" . $notelp,
                        // to
                        array(
                            "from" => $this->twilioSMSNumber,
                            "body" => "Mohon Maaf, Permintaan kunjungan anda ditolak, dengan alasan: " . $alasan,
                        )
                    );
            }
        }

        $tamu->status = $newStatus;
        $tamu->save();





        return response()->json(['message' => 'Status updated successfully']);

    }
}
