<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp = new Employee();
        $emp->emp_name = $request->input('name');
        $emp->emp_email = $request->input('email');
        $emp->emp_contact = $request->input('contact');
        $emp->emp_address = $request->input('address');
        if($request->hasFile('profile'))
        {
            $file=$request->file('profile');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/employee_profile/',$filename);
            $emp->emp_profile=$filename;
        }
        $emp->emp_password = $request->input('password');
        if($emp->save()){
            $response="1";
        }else{
            $response="0";
        }
        echo $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp=Employee::find($id);
        return view('employees.edit',compact('emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $emp=Employee::find($id);
        $emp->emp_name = $request->input('name');
        $emp->emp_email = $request->input('email');
        $emp->emp_contact = $request->input('contact');
        $emp->emp_address = $request->input('address');
        if($request->hasFile('profile'))
        {
            $destination='uploads/employee_profile'.$emp->emp_profile;
            if(File::exists($destination))
            {
                File::delete($destination); 
            }
            $file=$request->file('profile');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/employee_profile/',$filename);
            $emp->emp_profile=$filename;
        } 
        $emp->update();
        return redirect()->back()->with('status','Employee data updated Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp=Employee::find($id);
        $destination='uploads/employee_profile/'.$emp->emp_profile;
        if(File::exists($destination))
        {
            File::delete($destination); 
        }
        $emp->delete();
        return redirect()->back()->with('status','Employee deleted Successfully');
    }
    public function fetch(Request $request)
    {
        $result_page = $request->get('result_page');


        $get_limitval = (int)$result_page;
        $emp = Employee::paginate($get_limitval);

        $paginate = $emp->links()->render();
        $imageroot = asset('uploads/employee_profile/');
        return response()->json(
            [
                'employee' => $emp,
                'imageroot' => $imageroot,
                'paginate' => $paginate
            ]
        );

    }
    public function search(Request $request)
    {
        $searchvalue = $request->get('search');
        // var_dump($searchvalue);
        $imageroot = asset('uploads/employee_profile/');

        if ($searchvalue) {
            $output = "";
            $products = Employee::where('emp_name', 'LIKE', '%' . $searchvalue . "%")
                ->orWhere('emp_email', 'LIKE', '%' . $searchvalue . "%")
                ->orWhere('emp_contact', 'LIKE', '%' . $searchvalue . "%")
                ->orWhere('emp_address', 'LIKE', '%' . $searchvalue . "%")
                ->get();
            if ($products) {
                foreach ($products as $key => $product) {
                    $image=$imageroot.'/'.$product->emp_profile;
                    $output .= '<tr>' .
                        '<td>' . $product->id . '</td>' .
                        '<td>' . $product->emp_name . '</td>' .
                        '<td>' . $product->emp_email . '</td>' .
                        '<td>' . $product->emp_contact . '</td>' .
                        '<td>' . $product->emp_address . '</td>' .
                        '<td>' . '<img src="'.$image.'"width="70px" height="70px" alt="Image">'. '</td>' .
                        '<td>' . '<a href="edit-employee/' .$product->id. '" class="btn btn-primary btn-sm">Edit</a>' . '</td>' .
                        '<td>' . '<a href="delete-employee/' .$product->id. '" class="btn btn-danger btn-sm">Delete</a>'. '</td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
    }
}
