<body class="dx-apiref dx-apis">
    <main class="dx-main">
        <div class="dx-flex dx-core">
            <div class="dx-main-nav-slug"></div>
                <article class="dx-content dx-flex-block ">
                    <?php
                        echo "<br>";
                        if(!empty($response))
                        {
                            echo "<div class='alert alert-success' style='text-transform:uppercase;'><pre>".$response."</pre></div>";
                        }
                    ?>
				    <header>
				        <h1 class="dx-content-title">Redirect Post to BCA</h1>
				    </header>
                    <form method="POST" action="">
                        Trx ID <input type="text" name="trx_id" value="" class="form-control" required><br>
                        Klikpay Code <input type="text" name="klikpaycode" value="" class="form-control" required><br>
                        Total Amount <input type="text" name="totalamount" value="" class="form-control" required><br>
                        Currency <input type="text" name="currency" value="" class="form-control" required><br>
                        Description <input type="text" name="description" value="" class="form-control" required><br>
                        Callback <input type="text" name="callback" value="" class="form-control" required><br>
                        Misc Fee <input type="text" name="misc_fee" value="" class="form-control" required><br><br>

                        <button type="submit" name="submitForm" value="submit" class="btn btn-primary">Send</button>
                        <button type="submit" name="submitForm" value="code" class="btn btn-primary">Code</button>
                    </form>
				</article>
			</div>
        </main>
        <script id="PayPalAnalytics" src="<?php echo base_url('assets/js/pa.js');?>"></script>
    </body>
