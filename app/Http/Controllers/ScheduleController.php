<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ScheduleController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        if(!Auth::user()->hasRole('Doctor')) return abortView();
        return view('pages.schedule.create' , [
            'page_title' => 'Create Schedule',
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function edit(Schedule $schedule)
    {
        $timeSplit = explode(' - ' , $schedule->time);
        $schedule->from = $timeSplit[0];
        $schedule->to = $timeSplit[1];
        if(!Auth::user()->hasRole('Doctor')) return abortView();
        return view('pages.schedule.edit' , [
            'page_title' => 'Edit Schedule',
            'alertData' => Session::get('alertData'),
            'schedule' => $schedule
        ]);
    }

    /**
     * @return Application|RedirectResponse|Redirector|void
     * @throws Exception
     */
    public function store(){
        $user = Auth::user();
        if(!$user->hasRole('Doctor')) return abortRequest();
        $day = request('day'); $from = request('from'); $to = request('to');

        $dayArray = ['Saturday'=>true,'Sunday'=>true,'Monday'=>true,'Tuesday'=>true,'Wednesday'=>true,'Thursday'=>true];
        $fromArray = ['08:00'=>true,'09:00'=>true,'10:00'=>true,'11:00'=>true,'12:00'=>true,'01:00'=>true];
        $toArray = ['08:50'=>true,'09:50'=>true,'10:50'=>true,'11:50'=>true,'12:50'=>true,'01:50'=>true];

        $alertData = alert('Fail' , 'Please Enter Valid Information' , 'error');
        if (!(@$dayArray[$day] && @$fromArray[$from] && @$toArray[$to]))
            return redirect()->back()->with($alertData);

        $from_time = new \DateTime($from); $to_time = new \DateTime($to);

        $alertData = alert('Fail' , 'Time Interval Should Be Only 50 Minutes' , 'error');
        $diff = $to_time->diff($from_time);
        if (!($diff->i == 50 && $diff->h == 0))
            return redirect()->back()->with($alertData);

        $time = $from.' - '.$to;
        $data = ['day' => $day , 'time' => $time , 'user_id' => $user->id];

        $alertData = alert('Fail' , 'This Schedule Already Exist' , 'error');
        if (Schedule::where($data)->first() != null)
            return redirect()->back()->with($alertData);

        Schedule::create($data);
        $alertData = alert('Success' , 'Schedule Has Been Saved' , 'success');
        return redirect(route('schedule.index'))->with($alertData);
    }

    /**
     * @return Application|RedirectResponse|Redirector|void
     * @throws Exception
     */
    public function update(Schedule $schedule){
        $user = Auth::user();
        if(!$user->hasRole('Doctor')) return abortRequest();
        $day = request('day'); $from = request('from'); $to = request('to');

        $dayArray = ['Saturday'=>true,'Sunday'=>true,'Monday'=>true,'Tuesday'=>true,'Wednesday'=>true,'Thursday'=>true];
        $fromArray = ['08:00'=>true,'09:00'=>true,'10:00'=>true,'11:00'=>true,'12:00'=>true,'01:00'=>true];
        $toArray = ['08:50'=>true,'09:50'=>true,'10:50'=>true,'11:50'=>true,'12:50'=>true,'01:50'=>true];

        $alertData = alert('Fail' , 'Please Enter Valid Information' , 'error');
        if (!(@$dayArray[$day] && @$fromArray[$from] && @$toArray[$to]))
            return redirect()->back()->with($alertData);

        $from_time = new \DateTime($from); $to_time = new \DateTime($to);

        $alertData = alert('Fail' , 'Time Interval Should Be Only 50 Minutes' , 'error');
        $diff = $to_time->diff($from_time);
        if (!($diff->i == 50 && $diff->h == 0))
            return redirect()->back()->with($alertData);

        $time = $from.' - '.$to;
        $data = ['day' => $day , 'time' => $time , 'user_id' => $user->id];

        $alertData = alert('Fail' , 'This Schedule Already Exist' , 'error');
        $current_schedule = Schedule::where($data)->first();
        if ($current_schedule != null && $current_schedule != $schedule)
            return redirect()->back()->with($alertData);

        $schedule->update($data);
        $alertData = alert('Success' , 'Schedule Has Been Updated' , 'success');
        return redirect(route('schedule.index'))->with($alertData);
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        if (request('user_id') != null)
            $user = User::findOrFail(request('user_id'));
        else
            $user = Auth::user();

        if($user->hasRole(['Patient' , 'Admin'])) return abortView();
        if (request()->has('search'))
            $schedules = $user->schedules()->where('day', 'like', '%' . request('search') . '%')
                ->orWhere('time', 'like', '%' . request('search') . '%')->paginate(10);
        return view('pages.schedule.index' , [
            'page_title' => 'Schedules',
            'schedules' => $schedules ?? $user->schedules()->paginate(10),
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @return false|string
     */
    public function doctorSchedules(){
        return json_encode(User::findOrFail(request('id'))->schedules()->get());
    }

    /**
     * @param Schedule $schedule
     */
    public function delete(Schedule $schedule){
        if(!Auth::user()->hasRole('Doctor')) return abortRequest();
        $schedule->delete();
    }
}
