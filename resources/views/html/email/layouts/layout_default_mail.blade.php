<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Open+sans:200,300,400,500,600,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background: #f6f6f2;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }

        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
        a {
            text-decoration: none;
        }

        /* What it does: A work-around for email clients meddling in triggered links. */
        *[x-apple-data-detectors],  /* iOS */
        .unstyle-auto-detected-links *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
        .im {
            color: inherit !important;
        }

        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img + div {
            display: none !important;
        }

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */

        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u ~ div .email-container {
                min-width: 320px !important;
            }
        }
        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u ~ div .email-container {
                min-width: 375px !important;
            }
        }
        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
            u ~ div .email-container {
                min-width: 414px !important;
            }
        }
    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

        .primary{
            background: #17bebb;
        }
        .bg_white{
            background: #ffffff;
        }
        .bg_light{
            background: #f7fafa;
        }
        .bg_black{
            background: #000000;
        }
        .bg_dark{
            background: rgba(0,0,0,.8);
        }
        .email-section{
            padding:2.5em,2.5em,2.5em,2.5em;
        }

        /*BUTTON*/
        .btn{
            padding: 10px 15px;
            display: inline-block;
        }
        .btn.btn-primary{
            border-radius: 5px;
            background: #29ABE2;
            color: #ffffff;
        }
        .btn.btn-white{
            border-radius: 5px;
            background: #ffffff;
            color: #000000;
        }
        .btn.btn-white-outline{
            border-radius: 5px;
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }
        .btn.btn-black-outline{
            border-radius: 0px;
            background: transparent;
            border: 2px solid #000;
            color: #000;
            font-weight: 700;
        }
        .btn-custom{
            color: rgba(0,0,0,.3);
            text-decoration: underline;
        }

        h1,h2,h3,h4,h5,h6{
            font-family: 'Open Sans', sans-serif;
            color: #000000;
            margin-top: 0;
            font-weight: 400;
        }

        body{
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 15px;
            line-height: 1.8;
            color: rgba(0,0,0,.4);
        }

        a{
            color: #29ABE2;
        }

        table{
        }
        /*LOGO*/

        .logo h1{
            margin: 0;
        }
        .logo h1 a{
            color: #29ABE2;
            font-size: 24px;
            font-weight: 700;
            font-family: 'Open Sans', sans-serif;
        }

        /*HERO*/
        .hero{
            position: relative;
            z-index: 0;
        }

        .hero .text{
            color: rgba(0,0,0,.3);
        }
        .hero .text h2{
            color: #000;
            font-size: 34px;
            margin-bottom: 15px;
            font-weight: 300;
            line-height: 1.2;
        }
        .hero .text h3{
            font-size: 24px;
            font-weight: 200;
        }
        .hero .text h2 span{
            font-weight: 600;
            color: #000;
        }


        /*PRODUCT*/
        .product-entry{
            display: block;
            position: relative;
            float: left;
            padding-top: 20px;
        }
        .product-entry .text{
            width: calc(100% - 125px);
            padding-left: 20px;
        }
        .product-entry .text h3{
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .product-entry .text p{
            margin-top: 0;
        }
        .product-entry img, .product-entry .text{
            float: left;
        }

        ul.social{
            padding: 0;
        }
        ul.social li{
            display: inline-block;
            margin-right: 10px;
        }

        /*FOOTER*/

        .footer{
            border-top: 1px solid rgba(0,0,0,.05);
            color: rgba(0,0,0,.5);
        }
        .footer .heading{
            color: #000;
            font-size: 20px;
        }
        .footer ul{
            margin: 0;
            padding: 0;
        }
        .footer ul li{
            list-style: none;
            margin-bottom: 10px;
        }
        .footer ul li a{
            color: rgba(0,0,0,1);
        }


        @media screen and (max-width: 500px) {

        }

    </style>

</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
<center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
        &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto; background: white" class="email-container">
        <!-- BEGIN BODY -->

        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
            <tr>
                <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td class="logo" style="text-align: left;">
                                <h1 style="padding-top: 10px">

                                    <img style="background: #ffffff;border-radius: 25px;padding: 5px 20px 5px 0px; width: 234px; height: 48px; box-sizing: border-box" alt="logo" width="234" height="48" loading="lazy"  src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgyIiBoZWlnaHQ9IjI4IiB2aWV3Qm94PSIwIDAgMTgyIDI4IiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cGF0aCBkPSJNMTMuNjAzIDI3Ljg3ODhDMTcuODEwOSAyNy44Nzg4IDIwLjk2NjggMjYuNjM5NyAyMy4xMDcgMjQuNTYyNUMyNS4yNDcyIDIyLjQ4NTIgMjYuMjk5MiAxOS41Njk4IDI2LjI5OTIgMTYuMjUzNVYxMy4wNDY1SDE0LjExMDlWMTguMjU3OUgxOC45NzE3QzE4Ljg2MjkgMTkuMjc4MyAxOC41MzY0IDIwLjI2MjIgMTcuNzAyMSAyMC45OTExQzE2Ljg2NzcgMjEuNzE5OSAxNS41OTgxIDIyLjE5MzcgMTMuODIwNyAyMi4xOTM3QzExLjUzNTQgMjIuMTkzNyAxMC4wODQ0IDIxLjM1NTUgOS4xMDQ5NSAyMC4wMDcxQzguMTI1NTQgMTguNjk1MiA3Ljc2Mjc5IDE2LjgzNjYgNy43NjI3OSAxNC42ODY1VjE0LjM5NDlDNy43NjI3OSA5LjY5MzggOS45NzU1NSA2Ljg1MTI2IDEzLjYzOTMgNi44NTEyNkMxNi4zOTYyIDYuODUxMjYgMTcuOTkyMyA4LjA5MDMxIDE4LjMxODcgMTAuNTY4NEgyNS42ODI1QzI1LjQyODYgNy4xNzkyNCAyMy45NDEzIDQuODEwNDYgMjEuNzY0OCAzLjI0MzQxQzE5LjU1MjEgMS42NzYzNyAxNi42NTAxIDAuOTgzOTU4IDEzLjYwMyAwLjk4Mzk1OEM5LjY4NTM1IDAuOTgzOTU4IDYuMzExOCAyLjMzMjM0IDMuODgxMzkgNC42NjQ2OUMxLjQ1MDk5IDYuOTk3MDMgMCAxMC4zMTMzIDAgMTQuMjg1NlYxNC41NzcxQzAgMTguNDc2NSAxLjE5NzA3IDIxLjc5MjggMy41MTg2NSAyNC4xMjUyQzUuODAzOTUgMjYuNDk0IDkuMjEzNzggMjcuODc4OCAxMy42MDMgMjcuODc4OFoiIGZpbGw9IiMyODI4MjgiLz4KPHBhdGggZD0iTTM4LjE5NDQgMjcuODc4OEM0My45NjIxIDI3Ljg3ODggNDcuMjI2OSAyNS40NzM2IDQ3LjgwNzIgMjEuMTM2OUg0MS43MTMxQzQxLjQ1OTIgMjIuNDEyNCA0MC41ODg2IDIzLjM5NjMgMzguNDEyMSAyMy4zOTYzQzM2LjA5MDUgMjMuMzk2MyAzNC42Mzk1IDIxLjkzODYgMzQuNDU4MSAxOS40MjRINDcuODA3MlYxNy43MTEyQzQ3LjgwNzIgMTQuMzIyIDQ2LjY4MjcgMTEuODQzOSA0NC45NDE1IDEwLjI0MDRDNDMuMTY0MSA4LjYzNjk2IDQwLjc2OTkgNy44NzE2NiAzOC4xNTgyIDcuODcxNjZDMzUuMjkyNSA3Ljg3MTY2IDMyLjcxNyA4LjgxOTE3IDMwLjg2NjkgMTAuNTY4NEMyOS4wMTY5IDEyLjMxNzcgMjcuODkyNCAxNC43OTU4IDI3Ljg5MjQgMTcuODU3VjE4LjE0ODVDMjcuODkyNCAyMS4yNDYyIDI4Ljk4MDcgMjMuNzI0MyAzMC44MzA3IDI1LjM2NDJDMzIuNjA4MSAyNy4wMDQyIDM1LjE4MzYgMjcuODc4OCAzOC4xOTQ0IDI3Ljg3ODhaTTQxLjQ5NTQgMTUuNzQzM0gzNC41MzA3QzM0Ljg1NzIgMTMuNDExIDM2LjE2MzEgMTIuMTcxOSAzOC4xNTgyIDEyLjE3MTlDNDAuMjk4NCAxMi4xNzE5IDQxLjM4NjYgMTMuNDExIDQxLjQ5NTQgMTUuNzQzM1oiIGZpbGw9IiMyODI4MjgiLz4KPHBhdGggZD0iTTUwLjE4MTMgOC4zODE4NlYyNy40NDE1SDU2LjY3NDRWMTYuNzYzN0M1Ni42NzQ0IDE0LjI4NTYgNTcuOTgwMyAxMy4xNTU5IDU5LjkwMjkgMTMuMTU1OUM2MS43ODkyIDEzLjE1NTkgNjIuNjIzNSAxNC4xNzYzIDYyLjYyMzUgMTYuMzYyOFYyNy40NDE1SDY5LjExNjdWMTUuMDUwOUM2OS4xMTY3IDEwLjIwNCA2Ni41Nzc0IDcuODcxNjYgNjIuOTEzNyA3Ljg3MTY2QzU5LjcyMTUgNy44NzE2NiA1Ny42OTAxIDkuNDM4NyA1Ni42NzQ0IDExLjQ0MzFWOC4zODE4Nkg1MC4xODEzWiIgZmlsbD0iIzI4MjgyOCIvPgo8cGF0aCBkPSJNODEuNjYxOCAyNy44Nzg4Qzg3LjQyOTQgMjcuODc4OCA5MC42OTQxIDI1LjQ3MzYgOTEuMjc0NSAyMS4xMzY5SDg1LjE4MDRDODQuOTI2NSAyMi40MTI0IDg0LjA1NTkgMjMuMzk2MyA4MS44Nzk0IDIzLjM5NjNDNzkuNTU3OCAyMy4zOTYzIDc4LjEwNjggMjEuOTM4NiA3Ny45MjU0IDE5LjQyNEg5MS4yNzQ1VjE3LjcxMTJDOTEuMjc0NSAxNC4zMjIgOTAuMTUgMTEuODQzOSA4OC40MDg4IDEwLjI0MDRDODYuNjMxNCA4LjYzNjk2IDg0LjIzNzMgNy44NzE2NiA4MS42MjU1IDcuODcxNjZDNzguNzU5OCA3Ljg3MTY2IDc2LjE4NDMgOC44MTkxNyA3NC4zMzQzIDEwLjU2ODRDNzIuNDg0MiAxMi4zMTc3IDcxLjM1OTcgMTQuNzk1OCA3MS4zNTk3IDE3Ljg1N1YxOC4xNDg1QzcxLjM1OTcgMjEuMjQ2MiA3Mi40NDggMjMuNzI0MyA3NC4yOTggMjUuMzY0MkM3Ni4wNzU0IDI3LjAwNDIgNzguNjUwOSAyNy44Nzg4IDgxLjY2MTggMjcuODc4OFpNODQuOTYyNyAxNS43NDMzSDc3Ljk5OEM3OC4zMjQ1IDEzLjQxMSA3OS42MzA0IDEyLjE3MTkgODEuNjI1NSAxMi4xNzE5QzgzLjc2NTcgMTIuMTcxOSA4NC44NTM5IDEzLjQxMSA4NC45NjI3IDE1Ljc0MzNaIiBmaWxsPSIjMjgyODI4Ii8+CjxwYXRoIGQ9Ik05My42NDg2IDguMzgxODZWMjcuNDQxNUgxMDAuMTQyVjE4LjQwMzZDMTAwLjE0MiAxNS4zNDI0IDEwMi4zMTggMTQuMTAzNCAxMDYuMjcyIDE0LjIxMjdWOC4xMjY3NkMxMDMuMzM0IDguMDkwMzEgMTAxLjMzOSA5LjI5MjkzIDEwMC4xNDIgMTIuMTcxOVY4LjM4MTg2SDkzLjY0ODZaIiBmaWxsPSIjMjgyODI4Ii8+CjxwYXRoIGQ9Ik0xMTMuNzAxIDI3Ljg3ODhDMTE2Ljc0OCAyNy44Nzg4IDExOC40MTYgMjYuNjM5NyAxMTkuMzIzIDI1LjIxODVWMjcuNDQxNUgxMjUuNjM1VjE1LjA4NzNDMTI1LjYzNSAxMi41NzI4IDEyNC44MDEgMTAuNzUwNiAxMjMuMzEzIDkuNTg0NDdDMTIxLjgyNiA4LjQxODMgMTE5LjY4NiA3Ljg3MTY2IDExNy4wNzQgNy44NzE2NkMxMTQuNDYyIDcuODcxNjYgMTEyLjI4NiA4LjQxODMgMTEwLjcyNiA5LjU0ODAzQzEwOS4xMyAxMC43MTQyIDEwOC4xNTEgMTIuNDI3IDEwOC4wMDUgMTQuNzIyOUgxMTQuMUMxMTQuMjQ1IDEzLjUyMDMgMTE0Ljg5OCAxMi40NjM1IDExNi42NzUgMTIuNDYzNUMxMTguNzQzIDEyLjQ2MzUgMTE5LjE3OCAxMy42Mjk2IDExOS4xNzggMTUuNDg4MlYxNS45MjU1SDExNy4zNjRDMTExLjAxNiAxNS45MjU1IDEwNy4yOCAxNy42NzQ4IDEwNy4yOCAyMi4xNTczQzEwNy4yOCAyNC4xOTgxIDEwOC4wNDIgMjUuNjE5MyAxMDkuMjM5IDI2LjUzMDRDMTEwLjQgMjcuNDQxNSAxMTEuOTk2IDI3Ljg3ODggMTEzLjcwMSAyNy44Nzg4Wk0xMTUuOTUgMjMuNDY5MkMxMTQuMzkgMjMuNDY5MiAxMTMuNzAxIDIyLjgxMzIgMTEzLjcwMSAyMS42ODM1QzExMy43MDEgMjAuMTE2NSAxMTQuODYxIDE5LjYwNjMgMTE3LjQ3MyAxOS42MDYzSDExOS4xNzhWMjAuNzcyNEMxMTkuMTc4IDIyLjQxMjQgMTE3LjggMjMuNDY5MiAxMTUuOTUgMjMuNDY5MloiIGZpbGw9IiMyODI4MjgiLz4KPHBhdGggZD0iTTEyOS4wNzkgMFYyNy40NDE1SDEzNS41MzZWMEgxMjkuMDc5WiIgZmlsbD0iIzI4MjgyOCIvPgo8cGF0aCBkPSJNMTM5LjY5OCAxLjM4NDgzVjI3LjQ0MTVIMTQ3LjA5OVYxOC4xMTIxSDE0OC44NEwxNTQuMSAyNy40NDE1SDE2MS45MzVMMTU1LjczMiAxNi42NTQ0QzE1OC40NTMgMTUuNTk3NSAxNjAuNDExIDEzLjU1NjcgMTYwLjQxMSA5LjgwMzEzVjkuNjU3MzZDMTYwLjQxMSA0LjExODA0IDE1Ni42NzUgMS4zODQ4MyAxNDkuODU1IDEuMzg0ODNIMTM5LjY5OFpNMTQ5LjQ5MyAxMy4yNjUySDE0Ny4wOTlWNi45OTcwM0gxNDkuNTI5QzE1MS45NTkgNi45OTcwMyAxNTMuMjI5IDcuNzk4NzcgMTUzLjIyOSA5Ljk0ODlWMTAuMDk0N0MxNTMuMjI5IDEyLjE3MTkgMTUxLjk5NiAxMy4yNjUyIDE0OS40OTMgMTMuMjY1MloiIGZpbGw9IiMyODI4MjgiLz4KPHBhdGggZD0iTTE3Mi4zMzQgMjcuODc4OEMxNzguMTAyIDI3Ljg3ODggMTgxLjM2NyAyNS40NzM2IDE4MS45NDcgMjEuMTM2OUgxNzUuODUzQzE3NS41OTkgMjIuNDEyNCAxNzQuNzI5IDIzLjM5NjMgMTcyLjU1MiAyMy4zOTYzQzE3MC4yMyAyMy4zOTYzIDE2OC43NzkgMjEuOTM4NiAxNjguNTk4IDE5LjQyNEgxODEuOTQ3VjE3LjcxMTJDMTgxLjk0NyAxNC4zMjIgMTgwLjgyMyAxMS44NDM5IDE3OS4wODEgMTAuMjQwNEMxNzcuMzA0IDguNjM2OTYgMTc0LjkxIDcuODcxNjYgMTcyLjI5OCA3Ljg3MTY2QzE2OS40MzIgNy44NzE2NiAxNjYuODU3IDguODE5MTcgMTY1LjAwNyAxMC41Njg0QzE2My4xNTcgMTIuMzE3NyAxNjIuMDMyIDE0Ljc5NTggMTYyLjAzMiAxNy44NTdWMTguMTQ4NUMxNjIuMDMyIDIxLjI0NjIgMTYzLjEyMSAyMy43MjQzIDE2NC45NzEgMjUuMzY0MkMxNjYuNzQ4IDI3LjAwNDIgMTY5LjMyNCAyNy44Nzg4IDE3Mi4zMzQgMjcuODc4OFpNMTc1LjYzNSAxNS43NDMzSDE2OC42NzFDMTY4Ljk5NyAxMy40MTEgMTcwLjMwMyAxMi4xNzE5IDE3Mi4yOTggMTIuMTcxOUMxNzQuNDM4IDEyLjE3MTkgMTc1LjUyNyAxMy40MTEgMTc1LjYzNSAxNS43NDMzWiIgZmlsbD0iIzI4MjgyOCIvPgo8cGF0aCBkPSJNMTM5LjY5OCAxLjM4NDc3VjI3LjQ0MTRIMTQ3LjA5OFYxOC4xMTJIMTQ4LjgzOUwxNTQuMDk5IDI3LjQ0MTRIMTYxLjkzNUwxNTUuNzMyIDE2LjY1NDNDMTU4LjQ1MiAxNS41OTc1IDE2MC40MTEgMTMuNTU2NyAxNjAuNDExIDkuODAzMDdWOS42NTczQzE2MC40MTEgNC4xMTc5OCAxNTYuNjc1IDEuMzg0NzcgMTQ5Ljg1NSAxLjM4NDc3SDEzOS42OThaTTE0OS40OTIgMTMuMjY1MUgxNDcuMDk4VjYuOTk2OTdIMTQ5LjUyOUMxNTEuOTU5IDYuOTk2OTcgMTUzLjIyOSA3Ljc5ODcxIDE1My4yMjkgOS45NDg4NFYxMC4wOTQ2QzE1My4yMjkgMTIuMTcxOSAxNTEuOTk1IDEzLjI2NTEgMTQ5LjQ5MiAxMy4yNjUxWiIgZmlsbD0iI0VGNTMzRiIvPgo8cGF0aCBkPSJNMTcyLjMzNCAyNy44Nzg3QzE3OC4xMDIgMjcuODc4NyAxODEuMzY3IDI1LjQ3MzUgMTgxLjk0NyAyMS4xMzY4SDE3NS44NTNDMTc1LjU5OSAyMi40MTIzIDE3NC43MjggMjMuMzk2MyAxNzIuNTUyIDIzLjM5NjNDMTcwLjIzIDIzLjM5NjMgMTY4Ljc3OSAyMS45Mzg1IDE2OC41OTggMTkuNDI0SDE4MS45NDdWMTcuNzExMkMxODEuOTQ3IDE0LjMyMiAxODAuODIyIDExLjg0MzkgMTc5LjA4MSAxMC4yNDA0QzE3Ny4zMDQgOC42MzY4OSAxNzQuOTEgNy44NzE2IDE3Mi4yOTggNy44NzE2QzE2OS40MzIgNy44NzE2IDE2Ni44NTcgOC44MTkxMSAxNjUuMDA3IDEwLjU2ODRDMTYzLjE1NyAxMi4zMTc2IDE2Mi4wMzIgMTQuNzk1NyAxNjIuMDMyIDE3Ljg1NjlWMTguMTQ4NUMxNjIuMDMyIDIxLjI0NjEgMTYzLjEyIDIzLjcyNDIgMTY0Ljk3IDI1LjM2NDJDMTY2Ljc0OCAyNy4wMDQxIDE2OS4zMjMgMjcuODc4NyAxNzIuMzM0IDI3Ljg3ODdaTTE3NS42MzUgMTUuNzQzM0gxNjguNjdDMTY4Ljk5NyAxMy40MTA5IDE3MC4zMDMgMTIuMTcxOSAxNzIuMjk4IDEyLjE3MTlDMTc0LjQzOCAxMi4xNzE5IDE3NS41MjYgMTMuNDEwOSAxNzUuNjM1IDE1Ljc0MzNaIiBmaWxsPSIjRUY1MzNGIi8+Cjwvc3ZnPgo=">

                                </h1>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr><!-- end tr -->
            <tr>
                <td valign="middle" class="hero bg_white" style="padding: 2em 0 2em 0;">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td style="padding: 0 2.5em; text-align: left;">
                                <div class="text">
                                    <h2>@yield('title')</h2>
                                    <p style="line-height: 1.4em; color: #858585;     font-weight: 200;  font-size: 1.2em;">
                                        @yield('description')
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr><!-- end tr -->
            <tr>
                <table class="bg_white" role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">

                    <tr>
                        <td valign="middle" style="text-align:left; padding: 1em 2.5em;">

                            @yield('content')

                        </td>
                    </tr>
                </table>
            </tr><!-- end tr -->
            <!-- 1 Column Text + Button : END -->
        </table>

        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
            <tr>
                <td valign="middle" class="bg_light footer email-section" style="background: #f7fafa;border-top-color: rgba( 0 , 0 , 0 , 0.05 );border-top-style: solid;border-top-width: 1px;color: rgba( 0 , 0 , 0 , 0.5 );padding: 2.5em;">
                    <table>
                        <tr>
                            <td valign="top" width="100%" style="padding-top: 20px;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="text-align: left; padding-right: 10px;">
                                            <h3 class="heading">© 1993 - {{  now()->year }} GeneralRe</h3>
                                            <p>{!! config('site.setting.idn') !!}, {!! config('site.setting.country') !!}, <br>{!! config('site.setting.sityAddress') !!}</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>

                        </tr>
                    </table>
                </td>
            </tr><!-- end: tr -->
            <tr>
                <td class="bg_white" style="text-align: center; ">
                    <p style="margin: 4px 0">{{__('Не хотите получать уведомления? Напишите на ')}} {{ env('MAIL_USERNAME') }} </p>
                </td>
            </tr>
        </table>

    </div>
</center>
</body>
</html>
