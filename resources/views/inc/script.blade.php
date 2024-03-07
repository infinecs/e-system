<script>
    $(document).ready(function() {
        const passwordInput = $("#password");
        const passwordInput2 = $("#password_confirmation");
        
        const toggleIcon = $("#toggle-password");
        const toggleIcon2 = $("#toggle-password2");
    
        toggleIcon.on("click", function() {
            if (passwordInput.attr("type") === "password") {
                passwordInput.attr("type", "text");
                toggleIcon.removeClass("ni-eye");
                toggleIcon.addClass("ni-eye-off");
            } else {
                passwordInput.attr("type", "password");
                toggleIcon.removeClass("ni-eye-off");
                toggleIcon.addClass("ni-eye");
            }
        });
    
        toggleIcon2.on("click", function() {
            if (passwordInput2.attr("type") === "password") {
                passwordInput2.attr("type", "text");
                toggleIcon2.removeClass("ni-eye");
                toggleIcon2.addClass("ni-eye-off");
            } else {
                passwordInput2.attr("type", "password");
                toggleIcon2.removeClass("ni-eye-off");
                toggleIcon2.addClass("ni-eye");
            }
        });
    });
     
    function showDeleteConfirmation(event, link) {
            event.preventDefault(); // Prevent the default behavior of the link
    
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, delay the navigation by a short timeout
                    setTimeout(function () {
                        window.location.href = link.getAttribute('href');
                    }, 100); // 100 milliseconds delay (adjust as needed)
                }
            });
    
            return false; // Prevent the link from executing immediately
        }
        
        // Check if the redirectToHome flag is set
        @if(session('redirectToHome'))
            setTimeout(function() {
                document.querySelector('.alert-success').textContent = 'The link has been reset. You will be directed to login page after 5 seconds';
                setTimeout(function() {
                    window.location.href = "/";
                }, 5000);
            }, 0); // Show the message immediately
        @endif

        $(document).ready(function() {
        function updateSubmitButtonState() {
            var assetTag = $('#asset_tag').val();
            var serialNumber = $('#serial_number').val();

            checkAssetTag(assetTag);
            checkSerialNumber(serialNumber);
        }

        function checkAssetTag(assetTag) {
            $.ajax({
                url: '/check-asset-tag',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { asset_tag: assetTag },
                success: function(response) {
                    if (response.exists) {
                        $('#asset-tag-validation-msg').text('Asset tag already exists!');
                        disableSubmitButton();
                    } else {
                        $('#asset-tag-validation-msg').text('');
                        enableSubmitButton();
                    }
                }
            });
        }

        function checkSerialNumber(serialNumber) {
            $.ajax({
                url: '/check-serial-number',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { serial_number: serialNumber },
                success: function(response) {
                    if (response.exists) {
                        $('#serial-number-validation-msg').text('Serial number already exists!');
                        disableSubmitButton();
                    } else {
                        $('#serial-number-validation-msg').text('');
                        enableSubmitButton();
                    }
                }
            });
        }

        function disableSubmitButton() {
            $('#submitButton').prop('disabled', true);
        }

        function enableSubmitButton() {
            // Enable the submit button only if both fields are empty
            if ($('#asset_tag').val() === '' && $('#serial_number').val() === '') {
                $('#submitButton').prop('disabled', false);
            }
        }

        // Trigger validation when either input changes
        $('#asset_tag, #serial_number').on('input', updateSubmitButtonState);
    });

    function openPrintPreview() {
        // Open the print preview window
        window.open("{{ route('assetPrintPreview') }}", "_blank");
    }
    $(document).ready(function () {
        $('#openPrintPreview').click(function () {
            $.get('{{ route('assetPrintPreviewContent') }}', function (data) {
                $('#printPreviewModal .modal-body').html(data);
                $('#printPreviewModal').modal('show');
            });
        });

        $('#printButton').click(function () {
            window.print();
        });
    });
    
    </script>