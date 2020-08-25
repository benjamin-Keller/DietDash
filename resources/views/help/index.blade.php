@extends('layouts.app')

@section('content')
<div class="container">
    <!-- header -->
    <div class="container">
        <div class="card">
            <div class="card-header container-fluid">
                <div class="row align-middle">
                    <div class="col-sm">
                        <h3 class="float-left">Help</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <h3>Patients</h3>
                    <hr />
                    <h4>Adding</h4>
                    <p>To add a Patient, go to the Patients page and click the Add button. After filling in the required information, click the Submit button.
                        <br />The Patient is now added and will be shown on the Patients page and on the Dashboard.</p>
                    <h4>Editing</h4>
                    <p>To edit a Patient, go to the Patients page (or from the Dashboard) click the blue button in the same row as the Patient you want to edit. There you will be able to change the information you need, click Submit once you are done.
                        <br />The Patient is now edited and the new information will now be shown on the Patients page and on the Dashboard.</p>
                    <h4>Deleting</h4>
                    <p>To delete a Patient, go to the Patients page (or from the Dashboard) click the red button (trash can) in the same row as the Patient you want to delete.
                        <br />The Patient is now deleted, you can undelete a patient by clicking on the red button next to the Add patient button, then clicking on the red restore button in the same row as the Patient you want to restore.</p>
                    <br />
                </div>
                <div>
                    <h3>Calculations</h3>
                    <hr />
                    <p></p>
                    <br />
                </div>
                <div>
                    <h3>Bookings</h3>
                    <hr />
                    <p></p>
                    <br />
                </div>
                <div>
                    <h3>Payments</h3>
                    <hr />
                    <p></p>
                    <br />
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
