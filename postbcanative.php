<head>
    <link href="css/bootstrap.css" rel="stylesheet">

    <TITLE>Redirect Post to BCA - API Test</TITLE>

</head>

<body class="dx-apiref dx-apis">
    <main class="dx-main">
        <div class="dx-flex dx-core">
            <div class="dx-main-nav-slug"></div>
            <article class="dx-content dx-flex-block ">
                <header>
                    <h1 class="dx-content-title" style="text-align: center;">Redirect Post to BCA</h1>
                </header>
                <br/>
                <p align="left">
                    <b>This is the payment test page for integrating to 'Redirect Post to BCA':</b>
                </p>
                <br/>

                <form action="postbcanativeres.php" method="POST" name="theForm">
                    <table class="table">
                        <tr>
                            <td>Transaction ID</td>
                            <td></td>
                            <td>
                                <input type="text" name="trx_id" value="" class="form-control" required>
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
                            <td>Total Amount</td>
                            <td></td>
                            <td>
                                <input type="text" name="totalamount" value="" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Currency</td>
                            <td></td>
                            <td>
                                <input type="text" name="currency" value="" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td></td>
                            <td>
                                <input type="text" name="description" value="" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Callback</td>
                            <td></td>
                            <td>
                                <input type="text" name="callback" value="" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Misc Fee</td>
                            <td></td>
                            <td>
                                <input type="text" name="misc_fee" value="" class="form-control" required>
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
                                <button type="submit" name="submitForm" value="submit" class="btn btn-primary">Send</button>
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