<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\tamuModel;
use App\Models\deptModel;
use App\Models\notifModel;
use App\Models\User;
use Arhey\FaceDetection\Facades\FaceDetection;

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

    public function sendWhatsAppMessage(Request $request)
    {

        $nama = $request->input("nama");
        $notelp = ltrim($request->input("notelp"), 0);
        $dept = $request->input("dept");
        $tujuan = $request->input("tujuan");
        $jadwal = $request->input("jadwal");
        $sendto = $request->input("sendto");
        $base64Image = $request->input('foto');

        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

        $tempFilePath = tempnam(sys_get_temp_dir(), 'img');
        file_put_contents($tempFilePath, $imageData);
        $face = FaceDetection::extract($tempFilePath);

        if ($face->found) {
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
                'foto' => $base64Image,
            ]);

            $userDept = User::where('id_departement', $dept)->first();

            if ($userDept) {
                notifModel::create([
                    'notifHead' => "Kunjungan",
                    'notifPost' => "Ada tamu yang ingin berkunjung",
                    'id' => $userDept->id,
                    'created_at' => now(),
                    'status' => 0,
                ]);
            }

            $response = [
                'success' => true,
                'message' => 'Berhasil, silahkan cek WA atau SMS anda',
            ];

        } else {
            $response = [
                'success' => false,
                'message' => 'Wajah tidak terdeteksi. Silakan foto dengan wajah yang jelas.',
            ];
        }
        return response()->json($response);
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
