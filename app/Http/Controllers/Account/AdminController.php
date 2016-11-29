<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use GuzzleHttp\Client;
use App\Group;
use App\Teacher;

class AdminController extends Controller
{
    /**
     * Returns view page for update groups.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateGroups()
    {
        return view('admin.groups.update');
    }

    /**
     * Returns view page for update teachers.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateTeachers()
    {
        return view('admin.teachers.update');
    }

    /**
     * Update groups in DB.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function postUpdateGroups()
    {
        $groups = Group::select('number')->get();

        $client = new Client();
        $res = $client->request('GET', 'https://www.bsuir.by/schedule/rest/studentGroup');
        $xml_groups = ((new \SimpleXMLElement($res->getBody()->getContents())));

        $count = count($groups);

        for($j = 0; $j < $count; $j++) {
            for($i = 0; $i < count($xml_groups); $i++) {
                if(!strcmp($groups[$j]->number, $xml_groups->studentGroup[$i]->name->__toString()))
                {
                    unset($groups[$j]);
                    unset($xml_groups->studentGroup[$i]);
                    break;
                }
            }
        }

        $new_groups = [];

        for($i = 0; $i < count($xml_groups); $i++) {
            $new_groups[] = [
                'number' => $xml_groups->studentGroup[$i]->name->__toString(),
                'group_api_id' => $xml_groups->studentGroup[$i]->id->__toString(),
                'speciality_id' => 1,
                'faculty_id' => 1,
            ];
        }

        Group::insert($new_groups);

        return redirect()->back()->with('messages', ['Successfully updated']);
    }

    /**
     * Update teachers in DB.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function postUpdateTeachers()
    {
        $teachers = Teacher::select('teacher_id_api')->get();

        $client = new Client();
        $res = $client->request('GET', 'https://www.bsuir.by/schedule/rest/employee');
        $xml_teachers = ((new \SimpleXMLElement($res->getBody()->getContents())));

        $count = count($teachers);

        for($j = 0; $j < $count; $j++) {
            for($i = 0; $i < count($xml_teachers); $i++) {
                if($teachers[$j]->getApiId() == (int)$xml_teachers->employee[$i]->id)
                {
                    unset($teachers[$j]);
                    unset($xml_teachers->employee[$i]);
                    break;
                }
            }
        }

        $new_teachers = [];

        for($i = 0; $i < count($xml_teachers); $i++) {
            $new_teachers[] = [
                'teacher_id_api' => (int)$xml_teachers->employee[$i]->id,
                'firstName' => $xml_teachers->employee[$i]->firstName->__toString(),
                'middleName' => $xml_teachers->employee[$i]->middleName->__toString(),
                'lastName' => $xml_teachers->employee[$i]->lastName->__toString(),
                'department' => $xml_teachers->employee[$i]->academicDepartment->__toString(),
                'rank' => $xml_teachers->employee[$i]->rank->__toString(),
            ];
        }

        Teacher::insert($new_teachers);

        return redirect()->back()->with('messages', ['Successfully updated']);
    }

}
