
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    {{--        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }
    </style>
    <script>

        $(document).ready(function() {
            $("#upload").on('click', function() {
                var fileData = $('#file').prop('files')[0];
                var formData = new FormData();
                formData.append('file', formData);

                $.ajax({
                    url: '/api/upload',
                    contentType: false,
                    processData: false,
                    data: formData,
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    success: (data) => {
                        console.log(data);
                    },
                    error: (error) => {
                        console.log(error);
                    }
                });
                console.log(fileData);
            });
        });
    </script>
</head>
