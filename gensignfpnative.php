<head>
    <link href="css/bootstrap.css" rel="stylesheet">

    <TITLE>Transaction Signature Faspay - API Test</TITLE>

    <script>
        function generateID(form)
        {
            var date = new Date();

            var yy = date.getFullYear();
            var m = date.getMonth() + 1;
            var d  = date.getDate();

            var day = (d < 10) ? '0' + d : d;
            var month = (m < 10) ? '0' + m : m;
            var year = (yy < 1000) ? yy + 2000 : yy;

            var hh = date.getHours();
            var mm = date.getMinutes();
            var ss = date.getSeconds();

            var hour = (hh<10)?'0'+hh:hh;
            var min = (mm<10)?'0'+mm:mm;
            var sec = (ss<10)?'0'+ss:ss;
            
            form.bill_no.value = year+month+day+hour+min+sec;
        }
    </script>
</head>

<body class="dx-apiref dx-apis">
    <main class="dx-main">
        <div class="dx-flex dx-core">
            <div class="dx-main-nav-slug"></div>
            <article class="dx-content dx-flex-block ">
                <header>
                    <h1 class="dx-content-title" style="text-align: center;">Transaction Signature Faspay</h1>
                </header>
                <br/>
                <p align="left">
                    <b>This is the payment test page for integrating to 'Transaction Signature Faspay':</b>
                </p>
                <br/>

                <form action="gensignfpnativeres.php" method="POST" name="theForm">
                    <table class="table">
                        <tr>
                            <td>User ID</td>
                            <td></td>
                            <td>
                                <input type="text" name="user_id" value="" class="form-control" required>
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
                            <td>Order ID</td>
                            <td>
                                <input type="button" value="Generate" onClick="generateID(document.theForm);"/>
                            </td>
                            <td>
                                <input type="text" name="order_id" value="" class="form-control" required>
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