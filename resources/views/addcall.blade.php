@extends('layouts.main')
@section('content')
    <section class="main-content">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading text-left">Add User</div>
                <div class="panel-body">
                    <form class="form-horizontal col-md-offset-3" method="POST" action="saveuser">
                        @csrf

                        <div class="form-group">
                            <label class="control-label col-sm-2" name="type">User Type:</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="about" required name="about">
                                    <option value="">Conversation About</option>
                                    <option value="account">Acounts</option>
                                    <option value="complain">Complain</option>
                                    <option value="genq">General Query</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="" value=""
                                    placeholder="Enter Name" name="name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Number:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="" value=""
                                    placeholder="Calling Number" name="clnum" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Number:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="" value=""
                                    placeholder="Registered Number" name="regnum" required>
                            </div>
                        </div>

                        <div id="accounts">
                            <div class="form-group">
                                <label class="control-label col-sm-2" name="type">Issue: </label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="about" required name="about">
                                        <option value="">Select Issue</option>
                                        <option value="account">Withdrawl Issue</option>
                                        <option value="complain">Deposite Issue</option>
                                        <option value="genq">Balance Deducted But Not Credited </option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">Remarks:</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="remarks" placeholder="Remarks" name="remarks" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="complain">
                            <div class="form-group">
                                <label class="control-label col-sm-2" name="type">Issue: </label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="about" required name="about">
                                        <option value="">Select Issue</option>
                                        <option value="application">Application related issue</option>
                                        <option value="technical">Technical Issue</option>
                                        <option value="other">Others Issue</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">Remarks:</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="remarks" placeholder="Remarks" name="remarks" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="gen-query">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Remarks:</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="remarks" placeholder="Remarks" name="remarks" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="others">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Remarks:</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="remarks" placeholder="Remarks" name="remarks" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-2 ">
                                <input type="submit" name="submit" class="btn btn-info" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <section>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.42.0/apexcharts.min.js"></script>
                <script src="js/index.js"></script>

                <script>
                        
                </script>
            @endsection
