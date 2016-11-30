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
                $shedule[$i]['modules'][$j]['auditory'] = $sheduleModel->schedule[$j]->auditory->__toString();
                $shedule[$i]['modules'][$j]['lessonTime'] = $sheduleModel->schedule[$j]->lessonTime->__toString();
                $shedule[$i]['modules'][$j]['lessonType'] = $sheduleModel->schedule[$j]->lessonType->__toString();
                $shedule[$i]['modules'][$j]['numSubgroup'] = $sheduleModel->schedule[$j]->numSubgroup->__toString();
                $shedule[$i]['modules'][$j]['subject'] = $sheduleModel->schedule[$j]->subject->__toString();
                $shedule[$i]['modules'][$j]['zaoch'] = (boolean)$sheduleModel->schedule[$j]->zaoch;

                $studentGroups = $sheduleModel->schedule[$j]->studentGroup;

                for($k = 0; $k < count($studentGroups); $k++) {
                    $shedule[$i]['modules'][$j]['studentGroups'][$k] = (int)$studentGroups[$k];
                }

                $weekNumbers = $sheduleModel->schedule[$j]->weekNumber;

                for($k = 0; $k < count($weekNumbers); $k++) {
                    $shedule[$i]['modules'][$j]['weekNumbers'][$k] = (int)$weekNumbers[$k];
                }
            }

            $shedule[$i]['modules'] = (object)$shedule[$i]['modules'];

        }

        return $shedule;
    }

    public function getStudentShedule(Request $request, $group = null)
    {
        $client = new Client();
        $res = $client->request('GET', 'https://www.bsuir.by/schedule/rest/schedule/'.$group);
        $xml_shedule = ((new \SimpleXMLElement($res->getBody()->getContents())));

        $shedule = [];

        for($i = 0; $i < count($xml_shedule); $i++) {
            $sheduleModel = $xml_shedule->scheduleModel[$i];
            $shedule[$i]['weekDay'] = $sheduleModel->weekDay->__toString();

            for($j = 0; $j < count($sheduleModel->schedule); $j++) {
                $shedule[$i]['modules'][$j]['auditory'] = $sheduleModel->schedule[$j]->auditory->__toString();
                $shedule[$i]['modules'][$j]['lessonTime'] = $sheduleModel->schedule[$j]->lessonTime->__toString();
                $shedule[$i]['modules'][$j]['lessonType'] = $sheduleModel->schedule[$j]->lessonType->__toString();
                $shedule[$i]['modules'][$j]['numSubgroup'] = $sheduleModel->schedule[$j]->numSubgroup->__toString();
                $shedule[$i]['modules'][$j]['subject'] = $sheduleModel->schedule[$j]->subject->__toString();
                $shedule[$i]['modules'][$j]['zaoch'] = (boolean)$sheduleModel->schedule[$j]->zaoch;

                $studentGroups = $sheduleModel->schedule[$j]->studentGroup;

                for($k = 0; $k < count($studentGroups); $k++) {
                    $shedule[$i]['modules'][$j]['studentGroups'][$k] = (int)$studentGroups[$k];
                }

                $weekNumbers = $sheduleModel->schedule[$j]->weekNumber;

                for($k = 0; $k < count($weekNumbers); $k++) {
                    $shedule[$i]['modules'][$j]['weekNumbers'][$k] = (int)$weekNumbers[$k];
                }

                $shedule[$i]['modules'][$j]['teacher'] = $sheduleModel->schedule[$j]->employee;

            }

            $shedule[$i]['modules'] = (object)$shedule[$i]['modules'];

        }

        return $shedule;
    }
}
