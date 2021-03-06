<?php get_header(); ?>

    <main class="wrap">

        <div style="border: solid; padding: 20px; width: 400px;">
            <h2>Send Token</h2>
            <p>Account Id</p>
            <input type="text" id="accountId_for" disabled>
            <p>Count Tokens</p>
            <input type="number" id="count_tokens" disabled>
            <button onclick="{sendTokens()}" disabled style="width: 150px;">Send</button>
        </div>
        <br><br><br>
        <div style="border: solid; padding: 20px; width: 400px;">
            <h2>Send Token V2 (DEMO)</h2>
            <input type="text" id="reciver_id" placeholder="Account Id">
            <button onclick="{deployCntr()}" style="width: 150px;">DEMO transaction</button>
        </div>


        <script>
            function deployCntr() {
                jQuery.ajax({
                    type: "POST",
                    url: 'https://rest.nearapi.org/sign_url',
                    data: {
                        "account_id": localStorage.getItem('account_near'),
                        "receiver_id": document.getElementById("reciver_id").innerHTML,
                        "method": "!transfer",
                        "params": {},
                        "deposit": 0,
                        "gas": 30000000000000,
                        "meta": "",
                        "callback_url": "http://mysite.ru/near-production/",
                        "network": "testnet"
                    },
                    success: (res) => {
                        console.log(res)
                    },
                    dataType: "text"
                });


            }
        </script>
    </main>
<?php //get_footer(); ?>