<head>
    <link href="css/bootstrap.css" rel="stylesheet">

    <TITLE>Generate Signature and Authkey BCA - API Test</TITLE>

</head>

<body class="dx-apiref dx-apis">
    <main class="dx-main">
        <div class="dx-flex dx-core">
            <div class="dx-main-nav-slug"></div>
            <article class="dx-content dx-flex-block ">
                <header>
                    <h1 class="dx-content-title" style="text-align: center;">Generate Signature and Authkey BCA</h1>
                </header>
                <br/>
                <p align="left">
                    <b>This is the payment test page for integrating to 'Generate Signature and Authkey BCA':</b>
                </p>
                <br/>

                <form action="authkeynativeres.php" method="POST" name="theForm">
                    <table class="table">
                        <tr>
                            <td>Clearkey</td>
                            <td></td>
                            <td>
                                <input type="text" name="clearKey" value="" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Klikpay Code</td>
                            <td></td>
                            <td>
                                <input type="text" name="klikpaycode" value="" class="form-control" required>
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
                            <td>Transaction Date</td>
                            <td></td>
                            <td>
                                <input type="datetime" name="transactiondate" value="" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td></td>
                            <td>
                                <input type="text" name="amount" value="" class="form-control" required>
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
                                <button type="submit" name="submitForm" value="submit" class="btn btn-primary">Generate</button>
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