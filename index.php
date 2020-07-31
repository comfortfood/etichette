<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: Arial, serif;
        }

        article {
            position: relative;
            top: 50%;
            text-align: center;
            transform: translate(0, -50%);
        }

        /* Pattern styles */
        .container {
            display: grid;
        }

        .left-half {
            grid-column: 1;
        }

        .right-half {
            grid-column: 2;
        }

        textarea#styled {
            resize: none;
            white-space: nowrap;
            overflow: scroll;
        }
    </style>
    <title></title>
</head>
<body>
<section class="container">
    <div class="left-half">
        <article>
            <label for="styled"></label>
            <textarea id="styled" cols="70" rows="50"></textarea>
            <p>
                <button>Make PDF</button>
            </p>
        </article>
    </div>

    <div class="right-half">
        <iframe style="width: 100%; height: 100%; border: 0"></iframe>
    </div>
</section>

<script>
    let iframe = document.querySelectorAll('iframe')[0];
    let btn = document.querySelector('button');
    btn.onclick = function () {
        let xhr = new XMLHttpRequest;
        xhr.open('POST', 'strips.php', true);
        xhr.responseType = 'arraybuffer';
        xhr.onload = function () {
            let content = this.response;
            let blob = new Blob([content], {type: 'application/pdf'});
            let url = URL.createObjectURL(blob);
            iframe.onload = function (e) {
                console.log(e);
            };
            iframe.src = url;
        };

        let val = document.getElementById("styled").value;
        if (val !== "") {
            xhr.send(val);
        }
    };
</script>
</body>
</html>
