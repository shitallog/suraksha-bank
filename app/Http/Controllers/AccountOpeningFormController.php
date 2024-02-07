<?php

namespace App\Http\Controllers;

use App\Models\AccountOpenings;
use App\Models\branch;
use Illuminate\Http\Request;

class AccountOpeningFormController extends Controller
{
    public function create(Request $request){
        $AccountOpeningForm = new AccountOpenings;
            $AccountOpeningForm->prefix=$request->prefix;
            $AccountOpeningForm->FullName=$request->FullName;
            $AccountOpeningForm->DOB=$request->DOB;
            $AccountOpeningForm->gender=$request->gender;
            $AccountOpeningForm->MaritalStatus=$request->MaritalStatus;
            $AccountOpeningForm->FatherName=$request->FatherName;
            $AccountOpeningForm->MotherName=$request->MotherName;
            $AccountOpeningForm->GaurdianName=$request->GaurdianName;
            $AccountOpeningForm->RelationWithGuardian=$request->RelationWithGuardian;
            $AccountOpeningForm->Nationality=$request->Nationality;
            $AccountOpeningForm->ResidentialStatus=$request->ResidentialStatus;
            $AccountOpeningForm->OccupationType=$request->OccupationType;
            $AccountOpeningForm->religion=$request->religion;
            $AccountOpeningForm->category=$request->category;
            $AccountOpeningForm->CustomerType=$request->CustomerType;
            $AccountOpeningForm->Disability=$request->Disability;
            $AccountOpeningForm->Qualification=$request->Qualification;
            $AccountOpeningForm->PanNumber=$request->PanNumber;
            $AccountOpeningForm->Mobile=$request->Mobile;
            $AccountOpeningForm->Email=$request->Email;
            $AccountOpeningForm->Telephone=$request->Telephone;
            $AccountOpeningForm->AddressProof=$request->AddressProof;
            $AccountOpeningForm->AddressProofNumber=$request->AddressProofNumber;
            $AccountOpeningForm->issuedBy=$request->issuedBy;
            $AccountOpeningForm->AddressType=$request->AddressType;
            $AccountOpeningForm->Address=$request->Address;
            $AccountOpeningForm->City=$request->City;
            $AccountOpeningForm->District=$request->District;
            $AccountOpeningForm->State=$request->State;
            $AccountOpeningForm->Pin=$request->Pin;
            $AccountOpeningForm->Country=$request->Country;
            $AccountOpeningForm->BranchName=$request->BranchName;
            $AccountOpeningForm->BranchCode=$request->BranchCode;
            $AccountOpeningForm->Place=$request->Place;
            $AccountOpeningForm->signDate=$request->signDate;
            if ($request->hasFile('ApplicantPhoto')) {
                $file = $request->file('ApplicantPhoto');
                $name = $file->hashName();
                $filename = "images/customer/ApplicantPhoto/ApplicantPhoto-".time()."-".$name;
                $file->move('images/customer/ApplicantPhoto/',$filename);
                $AccountOpeningForm->ApplicantPhoto=$filename;
            }

            if ($request->hasFile('ApplicantAadhar')) {
                $file = $request->file('ApplicantAadhar');
                $name = $file->hashName();
                $filename = "images/customer/ApplicantAadhar/ApplicantAadhar-".time()."-".$name;
                $file->move('images/customer/ApplicantAadhar/',$filename);
                $AccountOpeningForm->ApplicantAadhar=$filename;
            }
            if ($request->hasFile('ApplicantSignature')) {
                $file = $request->file('ApplicantSignature');
                $name = $file->hashName();
                $filename = "images/customer/ApplicantSignature/ApplicantSignature-".time()."-".$name;
                $file->move('images/customer/ApplicantSignature/', $filename);
                $AccountOpeningForm->ApplicantSignature=$filename;
            }

            // dd($branch);
            $AccountOpeningForm->save();

        return redirect('/')->with('Success','Data Added');

    }


    function AccountOpeningList(){
        $data = AccountOpenings::all();
        return view('staff/accountApplication',['data'=>$data]);
    }

    public function AccountRequests($id){
        $data = AccountOpenings::find($id);
        return view('staff/AccountRequests',['data'=>$data]);
    }
}
