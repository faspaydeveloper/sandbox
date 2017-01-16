<head>
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
                <?php
                    echo "<br>";
                    if(!empty($response1) && !empty($response2))
                    {
                        echo "<div class='alert alert-success' style='text-transform:uppercase;'><pre><b>REQUEST:</b><br/>".$response1."</pre></div>";
                        echo "<div class='alert alert-success' style='text-transform:uppercase;'><pre><b>RESPONSE:</b><br/>".$response2."</pre></div>";
                    }
                ?>
                <header>
                    <h1 class="dx-content-title">Post XML</h1>
                </header>
                <form action="" method="post" id="theForm" name="theForm">
                    Merchant ID <input type="text" name="merchant_id" value="" class="form-control" required><br>
                    Merchant Name <input type="text" name="merchant_name" value="" class="form-control" required><br>
                    Bill No <input type="button" value="Generate" onClick="generateID(document.theForm);"/><input type="text" name="bill_no" value="" class="form-control" required><br>
                    Password <input type="password" name="password" value="" class="form-control" required><br>
                    Request <input type="text" name="request" value="" class="form-control" required><br>
                    Bill Desc <input type="text" name="bill_desc" value="" class="form-control" required><br>

                    Product
                    <table class="table table-bordered">
                        <tr align="center">
                            <td><b>Name</b></td>
                            <td><b>Calories</b></td>
                            <td><b>Description</b></td>
                            <td><b>Price</b></td>
                            <td><b>Buy</b></td>
                        </tr>
                        <tr align="center">
                            <td value="bwn" id="bwn" name="bwn">Belgian Waffles</td>
                            <td>650</td>
                            <td>Two of our famous Belgian Waffles with plenty of real maple syrup</td>
                            <td value="bwp" id="bwp" name="bwp">8000</td>
                            <td><input type="radio" name="bw" value="bw"></td>
                        </tr>
                        <tr align="center">
                            <td value="sbwn" id="sbwn" name="sbwn">Strawberry Belgian Waffles</td>
                            <td>900</td>
                            <td>Light Belgian waffles covered with strawberries and whipped cream</td>
                            <td value="sbwp" id="sbwp" name="sbwp">27000</td>
                            <td><input type="radio" name="sbw" value="sbw"></td>
                        </tr>
                        <tr align="center">
                            <td value="bbbwn" id="bbbwn" name="bbbwn">Berry-Berry Belgian Waffles</td>
                            <td>900</td>
                            <td>Light Belgian waffles covered with an assortment of fresh berries and whipped cream</td>
                            <td value="bbbwp" id="bbbwp" name="bbbwp">28000</td>
                            <td><input type="radio" name="bbbw" value="bbbw"></td>
                        </tr>
                        <tr align="center">
                            <td value="ftn" id="ftn" name="ftn">French Toast</td>
                            <td>600</td>
                            <td>Thick slices made from our homemade sourdough bread</td>
                            <td value="ftp" id="ftp" name="ftp">24000</td>
                            <td><input type="radio" name="ft" value="ft"></td>
                        </tr>
                        <tr align="center">
                            <td value="hbn" id="hbn" name="hbn">Homestyle Breakfast</td>
                            <td>950</td>
                            <td>Two eggs, bacon or sausage, toast, and our ever-popular hash browns</td>
                            <td value="hbp" id="hbp" name="hbp">7500</td>
                            <td><input type="radio" name="hb" value="hb"></td>
                        </tr>
                    </table>
                    
                    Misc Fee <input type="text" name="misc_fee" value="" class="form-control" required><br>

                    Channel <br>
                    <select name="channel" class="form-control">
                        <option id="302" value="302">tCash</option>
                        <option id="303" value="303">XLTunai</option>
                        <option id="305" value="305">eMoney</option>
                        <option id="307" value="307">Dompetku</option>
                        <option id="400" value="400">bri_mocash</option>
                        <option id="401" value="401">bri_epay</option>
                        <option id="402" value="402">Permata</option>
                        <option id="405" value="405">Klikpaybca</option>
                        <option id="406" value="406">clickpay Mandiri</option>
                        <option id="407" value="407">bii_sms</option>
                        <option id="408" value="408">bii_va</option>
                        <option id="409" value="409">Tft</option>
                        <option id="500" value="500">Credit Card</option>
                        <option id="700" value="700">cimb_clicks</option>
                        <option id="701" value="701">Danamon Debit Online</option>
                        <option id="800" value="800">bri_va</option>
                    </select>
                    <br>

                    Email <input type="email" name="emails" value="" class="form-control" required><br>

                    Show Redirect<br>
                    <input type="radio" name="red" value="yes" required>Yes
                    <input type="radio" name="red" value="no" required>No
                    <br><br>

                    <button type="submit" name="submitForm" value="submit" class="btn btn-primary">Send</button>
                    <button type="submit" name="submitForm" value="code" class="btn btn-primary">Code</button>
                </form>
                <?php
                    echo "<br>";
                    if(!empty($response3))
                    {
                        echo "<div class='alert alert-success'><pre><b>Redirect:</b><br/>".$response3."</pre></div>";
                    }
                ?>
            </article>
        </div>
    </main>
    
    <script id="PayPalAnalytics" src="<?php echo base_url('assets/js/pa.js');?>"></script>
    </body>
