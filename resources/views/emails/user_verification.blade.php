<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="title" content="Winngoo Epact" />
        <meta name="description" content='' />
        <meta name="author" content="" />
        <meta name="generator" content="" />
    </head>
    <body>



        <table style="width: 700px; margin:auto; border: 0; background-color: white;">
            <tr>
                <td class="" align="center">
                    <img src="https://winngoopages.co.uk/backend/images/logo-dark.png" />
                </td>
            </tr>
            <tr>

                <td style="width: 100%; height: auto; align-content: center; padding: 25px 15px;" align="center">
                    <h5 style="color: rgb(34, 46, 99); font-weight: 500; font-size: large; font-family: Arial, Helvetica, sans-serif; letter-spacing: 3px;">Thanks for contacting us</h5>
                </td>
            </tr>
            <tr>
                <td style="width: 100%; height: auto; background-color: #eef5ff; align-content: center; padding: 20px 20px;  border-radius: 10px;" align="center">
                    <p align="center" style="font-family: Arial, Helvetica, sans-serif; line-height: 35px; font-size: 18px;">
                        <b>Hello!</b><br />
                         <p align="center" style="font-family: Arial, Helvetica, sans-serif; line-height: 35px; font-size: 18px;">
                        Welcome <b>{{ $fname }} {{ $lname }},</b><br />
                        Thank you for signing up!

                    </p>
                    <h3 align="center" style="color: rgb(34, 46, 99); font-weight: 600; font-size: 18px; line-height: 35px; font-family: Arial, Helvetica, sans-serif; letter-spacing: 2px; z-index: 2;">
                        Just one more step to verify your email address. Simply click on the link below and get started.
                    </h3>
                    <!-- <button align="center" style="background: linear-gradient(to right, #013289 0%, #ff6633 100%); border: none; padding: 10px; border-radius: 20px; color: #ffffff;" type="button">Click Me!</button> -->
                    <!-- <a href="{{ url('/verification') }}/{{ $email }}/{{ $guid }}" target="_blank" style="background-color: #346ed7; border: none; padding: 10px; border-radius: 10px; color: #ffffff; text-decoration: none; font-family: Arial, Helvetica, sans-serif;">Verification Link</a> -->

                    <a href="{{ route('verification', ['email' => $email, 'guid' => $guid]) }}" 
   target="_blank" 
   style="background-color: #346ed7; border: none; padding: 10px; border-radius: 10px; color: #ffffff; text-decoration: none; font-family: Arial, Helvetica, sans-serif;">
   Verification Link
</a>
                    <p align="center" style="font-family: Arial, Helvetica, sans-serif; line-height: 35px; font-size: 18px; padding-top: 15px;">
                        If you have any issues with signing up, please contact us at <a href="mailto:info@winngoopages.co.uk" style="color: rgb(34, 46, 99);"><b>info@winngoopages.co.uk</b></a><br />
                        <!-- <b style="color: rgb(34, 46, 99);">Winngoo Pages</b> -->
                    </p>

                </td>
            </tr>
                <tr>
                <td style="width: 100%;height: auto;  padding: 0px 15px 15px 15px;" align="left">
                    <table>
                        <tr align="left">
                            <td >
                                <h3 align="left" style="color: rgb(34, 46, 99); font-weight: 600; font-size: 16px; line-height: 20px; font-family: Arial, Helvetica, sans-serif; z-index: 2;">
                                    <em>See you on the other side, <br />
                                    The Winngoo Page Team</em>
                                </h3>
                            </td>
                        </tr>
                    </table>
            </tr>

        </table></body></html>
