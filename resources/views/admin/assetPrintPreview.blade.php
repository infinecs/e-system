<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Lease Agreement</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Montserrat, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-top: 50px;
        }
        .signature {
            text-align: center;
            margin-top: 50px;
        }
        hr {
            height: 2px;
            border-width: 0;
            color: gray;
            background-color: gray;
        }
        .logo {
            height: 50%;
            width: 50%;
            padding-bottom: 5px;
        }
        .btnPrint {
            padding: 10px;
            border: 2px solid black;
            border-radius: 5px;
            color: black;
        }
        .btnPrint:hover {
            cursor: pointer;
            color: inherit;
        }
        h4 {
            font-size: 20px;
        }
        .signed {
            color: green;
        }

        /* Additional style for padding during printing */
        @media print {
            .printSection {
                padding-left: 50px;
                padding-right: 50px;
                margin: 50px;
            }
        }
    </style>
    
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="d-flex flex-row align-items-start">
                <a href="#" class="btnPrint"><i class="fas fa-print fa-xl"></i></a>
                <div class="ml-auto">
                    <h3>Status:<span class="signed">  Signed</span></h3>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="container printSection">
        <div class="header">
            <img class="logo" src="{{ asset('images/logo/infinecs-logo.png') }}">
            <h1>Infinecs Asset Agreement Form</h1>
        </div>

        <hr>
        
        <div class="row">
            <div class="col-md-6">
                <h4>Name:  {{$user->name}}</h4>
            </div>
            <div class="col-md-6">
                <h4>Position:  {{ ucfirst(trans($user->role)) }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>Brand:  {{$asset_list->brand}}</h4>   
            </div>
            <div class="col-md-6">
                <h4>Serial Number:  {{$asset_list->serial}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>Model:  {{$asset_list->model}}</h4>
            </div>
            <div class="col-md-6">
                <h4>Operating System:  {{$asset_list->operating_system}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>Device Name:  {{$asset_list->device_name}}</h4>
            </div>
            <div class="col-md-6">
                <h4>Catergory:  {{$asset_list->category}}</h4>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <h4>Item Leased:</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><i class="fa-regular fa-circle-check"></i>  Mouse</p>
            </div>
            <div class="col-md-4">
                <p><i class="fa-regular fa-circle-check"></i>  Keyboard</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><i class="fa-regular fa-circle-check"></i>  Laptop Bag</p>
            </div>
            <div class="col-md-4">
                <p><i class="fa-regular fa-circle-check"></i>  Access Card</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="consent">
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck" required>
                <label class="form-check-label" for="exampleCheck">By signing this lease agreement, you acknowledge that you have read and understood all the terms and conditions outlined herein. You agree to obey and abide by all the terms and conditions mentioned in this agreement.</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck2" required>
                <label class="form-check-label" for="exampleCheck2">I agree with the <a href="{{ asset('pdf/terms.pdf') }}" target="_blank" style="color: blue"> Terms and Conditions</a></label>
            </div>
            <input href="#" type="submit" class="btn btn-success" id="submitButton" disabled>
        </div>
    </div>

    <!-- Bootstrap JS (Optional - for certain Bootstrap features that require JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#exampleCheck, #exampleCheck2').change(function () {
                if ($('#exampleCheck').is(':checked') && $('#exampleCheck2').is(':checked')) {
                    $('#submitButton').prop('disabled', false);
                } else {
                    $('#submitButton').prop('disabled', true);
                }
            });

            $('.btnPrint').click(function () {
                // Get the HTML content of the printSection
                var contentToPrint = document.querySelector('.printSection').innerHTML;

                // Create a new element to hold the content to print
                var printElement = document.createElement('div');
                printElement.innerHTML = contentToPrint;

                // Hide all elements in the body
                var bodyElements = document.querySelectorAll('body > *');
                bodyElements.forEach(function(element) {
                    element.style.display = 'none';
                });

                // Append the printElement to the body
                document.body.appendChild(printElement);

                // Print the content
                window.print();

                // Remove the printElement and show all elements in the body
                document.body.removeChild(printElement);
                bodyElements.forEach(function(element) {
                    element.style.display = '';
                });
            });
        });
    </script>
</body>
</html>
