
<script src="{{ asset('/js/app.js') }}"></script>
    <h1>Hello There. Let's broadcast this thing</h1>
    <script>

        console.log("start welcome.blade.php script")

        document.onreadystatechange = () => {
            if (document.readyState === 'complete') {
                console.log("doc is ready");

                // Echo.join('finaltest');
                Echo.channel('finaltest')
                    .listen('.testevent', e => {
                        console.log("listening to event in welcome.blade.php script");
                        console.log(e);
                    })
            }
        }

        console.log("finish welcome.blade.php script")
    </script>
