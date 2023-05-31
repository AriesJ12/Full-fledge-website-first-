<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation</title>
    <link rel="stylesheet" href="../Assets/css/style.css"/>

</head>
<body>
    <!-- navbar -->
    <?php require_once "../Assets/navbar-footer/navbar.php"?>
    
    <main>
    <div class="container d-flex justify-content-center mt-5 mb-5">
        <div class="row g-3 w-100">

            <div class="col-md-6">  
                
                <span>Donation Method</span>
                

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <div class="p-0 accordion-header " id="headingTwo">
                            <h2 class="mb-0 ">
                                <button class="btn btn-light btn-block text-left p-3 rounded-0 border-bottom-custom w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="d-flex align-items-center justify-content-between">

                                        <span>Paypal</span>
                                        <img src="https://i.imgur.com/7kQEsHU.png" width="30">
                                    
                                    </div>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="accordion-body">
                            <input type="text" class="form-control" placeholder="Paypal email">
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header p-0">
                            <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left p-3 rounded-0 w-100" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="d-flex align-items-center justify-content-between">

                                <span>Credit card</span>
                                <div class="icons">
                                    <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                    <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                                    <img src="https://i.imgur.com/35tC99g.png" width="30">
                                    <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                </div>
                                
                                </div>
                            </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="accordion-body">
                            
                            <span class="fw-normal card-text">Card Number</span>
                            <div class="input">

                                <i class="fa fa-credit-card"></i>
                                <input type="text" class="form-control" placeholder="0000 0000 0000 0000">
                                
                            </div> 

                            <div class="row mt-3 mb-3">

                                <div class="col-md-6">

                                <span class="fw-normal">Expiry Date</span>
                                <div class="input">

                                    <i class="fa fa-calendar"></i>
                                    <input type="text" class="form-control" placeholder="MM/YY">
                                    
                                </div> 
                                
                                </div>


                                <div class="col-md-6">

                                <span class="fw-normal card-text">CVC/CVV</span>
                                <div class="input">

                                    <i class="fa fa-lock"></i>
                                    <input type="text" class="form-control" placeholder="000">
                                    
                                </div> 
                                
                                </div>
                                

                            </div>

                            <span class="text-muted"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
                            
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-6">
                <span>Summary</span>

                <div class="card">

                    <div class="d-flex justify-content-between p-3">

                    <div class="d-flex flex-column">

                        <span>Pro(Billed Monthly) <i class="fa fa-caret-down"></i></span>
                        <a href="#">Save 20% with annual Donation</a>
                        
                    </div>

                    <div class="mt-1">
                        <sup >450 pesos</sup>
                        <span >/Month</span>
                    </div>
                    
                    </div>

                    <hr class="mt-0 line">

                    <div class="p-3">

                    <div class="d-flex justify-content-between mb-2">

                        <span>Government Tax</span>
                        <span>25 pesos</span>
                        
                    </div>

                    <div class="d-flex justify-content-between">

                        <span>Vat <i class="fa fa-clock-o"></i></span>
                        <span>25 pesos</span>
                        
                    </div>
                    

                    </div>

                    <hr class="mt-0 line">


                    <div class="p-3 d-flex justify-content-between">

                    <div class="d-flex flex-column">

                        <span>Today you pay(Pesos)</span>
                        
                    </div>
                    <span>500Pesos</span>

                    

                    </div>


                    <div class="p-3">

                    <button class="btn btn-primary btn-block">Confirm transaction</button> 
                    
                    </div>



                    
                </div>
            </div>
        
        </div>


    </div>
    </main>

    <!-- footer -->
    <?php require_once "../Assets/navbar-footer/footer.html"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src = "../../Assets/js/bootstrapJS/bootstrap.bundle.js"></script> -->
</body>
</html>