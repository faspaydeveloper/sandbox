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
                        else
                    ?>
				    <header>
				        <h1 class="dx-content-title">Notification Payment</h1>
				    </header>
                    <form method="POST" action="">
                        URL <input type="text" name="url" value="" class="form-control" required><br>
                        Trx ID <input type="text" name="trx_id" value="" class="form-control" required><br>
                        Merchant ID <input type="text" name="merchant_id" value="" class="form-control" required><br>
                        Merchant Name <input type="text" name="merchant_name" value="" class="form-control" required><br>
                        Bill No <input type="text" name="bill_no" value="" class="form-control" required><br>
                        Password <input type="password" name="password" value="" class="form-control" required><br><br>

                        <button type="submit" name="submitForm" value="submit" class="btn btn-primary">Check</button>
                        <button type="submit" name="submitForm" value="code" class="btn btn-primary">Code</button>
                    </form>
				</article>
			</div>
        </main>
        <script id="PayPalAnalytics" src="<?php echo base_url('assets/js/pa.js');?>"></script>
    </body>
