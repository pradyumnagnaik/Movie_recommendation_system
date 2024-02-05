
<!doctype html>
<html>
    <head>

        <title>Payment Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/payment.css">
        <link rel="icon" type="image/png" href="webimg/mlogo.png">
    <title>Cine Verse</title>
    </head>

    <body>  
    <div class="nav"  style="height: 10vh">
    <img src="webimg/mlogo.png" class="image">
    <img src="webimg/cine.png" class="image">
    </div>
        <div class="container py-5">

            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-6">Payment Form</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card ">
                        <div class="card-header">

                            <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                <!-- Credit card form tabs -->
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                    <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#upi" class="nav-link "> <i ></i> UPI </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                                </ul>
                            </div> <!-- End -->

                            <!-- Credit card form content -->
                            <div class="tab-content">
                                <!-- credit card info-->
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <form action="index.php" method="post">
                                        <div class="form-group"> <label for="username">
                                                <h6>Card Owner</h6>
                                            </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                        <div class="form-group"> <label for="cardNumber">
                                                <h6>Card number</h6>
                                            </label>
                                            <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                                <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group"> <label><span class="hidden-xs">
                                                            <h6>Expiration Date</h6>
                                                        </span></label>
                                                    <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                    </label> <input type="text" required class="form-control"> </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="flag" value=1>
                                        <div class="card-footer"> <button name="payment" value="Confirm Payment" type="submit" class="subscribe btn btn-primary btn-block shadow-sm"/><i class="fas fa-credit-card mr-2"></i>Confirm Payment</button>
                                    </form>
                                </div>
                            </div> <!-- End -->
                        

                              <!-- UPI info -->
                              <div id="upi" class="tab-pane fade pt-3">
                            <form action="index.php" method="post">
                                <div class="form-group"> <label for="username">
                                    <h6>Enter your UPI ID</h6>
                                </label> <input type="text" name="username" placeholder="Ex: abc@paytm" required class="form-control "> </div>
                                <input type="hidden" name="flag" value=1>
                                <p> <button type="submit" name="payment" value="Confirm Payment" class="btn btn-primary "><i></i>Confirm Payment</button> </p>
                                </form>
                            <h6><span style="margin-left: 18vw;">OR</span><br>Scan QR:</h6>
                            <div class="qr"></div> 
                            <div class="upi2">
                                <br>
                            <form action="index.php" method="post">
                            <label for="otp">
                                    <h6>Enter the confirmation OTP:</h6>
                                </label> <input type="text" name="otp" required class="form-control ">
                                <input type="hidden" name="flag" value=1>
                                <br>
                                <p> <button type="submit" name="payment" value="Proceed" class="btn btn-primary "><i></i>Confirm Payment</button> </p>
                                </form>
                            </div> 
                            </div> <!-- End -->

                            <!-- bank transfer info -->
                            <div id="net-banking" class="tab-pane fade pt-3">
                            <form action="index.php" method="post">
                                <div class="form-group "> <label for="Select Your Bank">
                                        <h6>Select your Bank</h6>
                                    </label> <select class="form-control" id="ccmonth">
                                        <option value="" selected disabled>--Please select your Bank--</option>
                                        <option>SBI</option>
                                        <option>ICICI</option>
                                        <option>HDFC</option>
                                        <option>Karnataka Bank</option>
                                        <option>Canara Bank</option>
                                        <option>Axis Bank</option>
                                        
                                    </select> </div>
                                    <input type="hidden" name="flag" value=1>
                                <div class="form-group">
                                    <p> <button type="submit" name="payment" value="Confirm Payment" class="btn btn-primary " ><i class="fas fa-mobile-alt mr-2"></i>Confirm Payment</button> </p>
                                </div>
                                </form>
                            </div> <!-- End -->

                            <!-- End -->
                        </div>
                    </div>
                </div>
            </div>
        
            <script src="payment.js"></script>            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>            
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
</script>
        </body>
</html>

