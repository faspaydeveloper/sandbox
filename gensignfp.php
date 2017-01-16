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
            
            form.order_id.value = year+month+day+hour+min+sec;
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
                    if(!empty($response))
                    {
                        echo "<div class='alert alert-success'><pre><b>Signature Result:</b><br/>".$response."</pre></div>";
                    }
                ?>
			    <header>
			        <h1 class="dx-content-title">Generate Signature Faspay</h1>
			    </header>
                <form action="" method="post" id="theForm" name="theForm">
                    User ID <input type="text" name="user_id" value="" class="form-control" required><br>
                    Password <input type="password" name="password" value="" class="form-control" required><br>
                    Order ID <input type="button" value="Generate" onClick="generateID(document.theForm);"/><input type="text" name="order_id" value="" class="form-control" required><br>

                    <button type="submit" name="submitForm" value="submit" class="btn btn-primary">Generate</button>
                    <button type="submit" name="submitForm" value="code" class="btn btn-primary">Code</button>
                </form>
			</article>
		</div>
    </main>
    
    <script id="PayPalAnalytics" src="<?php echo base_url('assets/js/pa.js');?>"></script>
</body>
