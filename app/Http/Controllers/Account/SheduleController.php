<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use GuzzleHttp\Client;

class SheduleController extends Controller
{
    public function getTeacherShedule(Request $request, $teacher = null)
    {
        $client = new Client();
        $res = $client->request('GET', 'https://www.bsuir.by/schedule/rest/employee/'.$teacher);
        $xml_shedule = ((new \SimpleXMLElement($res->getBody()->getContents())));

        $shedule = [];

        for($i = 0; $i < count($xml_shedule); $i++) {
            $sheduleModel = $xml_shedule->scheduleModel[$i];
            $shedule[$i]['weekDay'] = $sheduleModel->weekDay->__toString();

            for($j = 0; $j < count($sheduleModel->schedule); $j++) {
                $shedule[$i][$j]['auditory'] = $sheduleModel->schedule->auditory->__toString();
                $shedule[$i][$j]['lessonTime'] = $sheduleModel->schedule->lessonTime->__toString();
                $shedule[$i][$j]['lessonType'] = $sheduleModel->schedule->lessonType->__toString();
                $shedule[$i][$j]['numSubgroup'] = $sheduleModel->schedule->numSubgroup->__toString();
                $shedule[$i][$j]['subject'] = $sheduleModel->schedule->subject->__toString();
                $shedule[$i][$j]['zaoch'] = (boolean)$sheduleModel->schedule->zaoch;

                $studentGroups = $sheduleModel->schedule->studentGroup;

                for($k = 0; $k < count($studentGroups); $k++) {
                    $shedule[$i][$j]['studentGroups'][$k] = (int)$studentGroups[$k];
                }

                $weekNumbers = $sheduleModel->schedule->weekNumber;

                for($k = 0; $k < count($weekNumbers); $k++) {
                    $shedule[$i][$j]['weekNumber'][$k] = (int)$weekNumbers[$k];
                }
            }

        }

        return dd($shedule);
    }
}
