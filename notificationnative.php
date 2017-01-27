<head>
    <link href="css/bootstrap.css" rel="stylesheet">

    <TITLE>Notification Payment - API Test</TITLE>

</head>

<body class="dx-apiref dx-apis">
    <main class="dx-main">
        <div class="dx-flex dx-core">
            <div class="dx-main-nav-slug"></div>
            <article class="dx-content dx-flex-block ">
                <header>
                    <h1 class="dx-content-title" style="text-align: center;">Notification Payment</h1>
                </header>
                <br/>
                <p align="left">
                    <b>This is the payment test page for integrating to Notification Payment:</b>
                </p>
                <br/>

                <form action="notificationnativeres.php" method="POST" name="theForm">
                    <table class="table">
                        <tr>
                            <td>URL</td>
                            <td></td>
                            <td>
                                <input type="text" name="url" value="" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Transaction ID</td>
                            <td></td>
                            <td>
                                <input type="text" name="trx_id" value="" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Merchant ID</td>
                            <td></td>
                            <td>
                                <input type="text" name="merchant_id" value="" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Merchant Name</td>
                            <td></td>
                            <td>
                                <input type="text" name="merchant_name" value="" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Bill No</td>
                            <td></td>
                            <td>
                                <input type="text" name="bill_no" value="" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td></td>
                            <td>
                                <input type="password" name="password" value="" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="submitForm" value="submit" class="btn btn-primary">Check</button>
                            </td>
                            <td>
                                <button type="submit" name="submitForm" value="code" class="btn btn-primary">Code</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </article>
        </div>
    </main>
</body>