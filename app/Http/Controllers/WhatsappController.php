<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Http\Controllers\tamuController;
use App\Models\tamuModel;

class WhatsappController extends Controller
{

    public function sendWhatsAppMessage()
    {
        $twilioSid = getenv("TWILIO_SID");
        $twilioToken = getenv("TWILIO_AUTH_TOKEN");
        $twilioWhatsAppNumber = getenv('TWILIO_WHATSAPP_NUMBER');
        $twilioSMSNumber = getenv('TWILIO_SMS_NUMBER');
        $twilio = new Client($twilioSid, $twilioToken);

        $nama = $_POST["nama"];
        $notelp = ltrim($_POST["notelp"], 0);
        $dept = $_POST["dept"];
        $tujuan = $_POST["tujuan"];
        $jadwal = $_POST["jadwal"];
        $sendto = $_POST["sendto"];

        if ($sendto == 0) {

            $message = $twilio->messages
                ->create(
                    "whatsapp:+62" . $notelp,
                    // to
                    array(
                        "from" => $twilioWhatsAppNumber,
                        "body" => "Permintaan kunjungan anda telah kami terima, mohon menunggu konfirmasi dari admin",
                    )
                );
        } elseif ($sendto == 1) {
            # code...

            $message = $twilio->messages
                ->create(
                    "+62" . $notelp,
                    // to
                    array(
                        "from" => $twilioSMSNumber,
                        "body" => "Permintaan kunjungan anda telah kami terima, mohon menunggu konfirmasi dari admin",
                    )
                );


        }
        tamuModel::create([
            'nama' => $nama,
            'notelp' => "0" . $notelp,
            'dept' => $dept,
            'tujuan' => $tujuan,
            'jadwal' => $jadwal,
            'sendTo' => $sendto,
            'status' => 0,
        ]);
        return redirect('/');
    }


    public function updateStatus($id, $newStatus)
    {
        // Retrieve data from the database
        $tamu = tamuModel::find($id);
        $nama = $tamu->nama;
        $notelp = ltrim($tamu->notelp, 0);
        $dept = $tamu->dept;
        $tujuan = $tamu->tujuan;
        $jadwal = $tamu->jadwal;


        if (!$tamu) {
            // Handle the case where the record is not found
            return response()->json(['message' => 'Record not found'], 404);
        }

        // Update the status
        $tamu->status = $newStatus;
        $tamu->save();

        // Continue with the Twilio message sending logic
        // ...

        // Send a response back to the client
        return response()->json(['message' => 'Status updated successfully']);
    }
}
