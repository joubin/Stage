<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=620" name="viewport">

    <title>HTML5 Demo: Drag and drop, automatic upload</title>
</head>

<body>
    <section id="wrapper">
        <header>
        </header><style>
        #holder { border: 10px dashed #ccc; width: 300px; min-height: 300px; margin: 20px auto;}
                #holder.hover { border: 10px dashed #0c0; }
                #holder img { display: block; margin: 10px auto; }
                #holder p { margin: 10px; font-size: 14px; }
                progress { width: 100%; }
                progress:after { content: '%'; }
                .fail { background: #c00; padding: 2px; color: #fff; }
                .hidden { display: none !important;}
        </style>

        <article>
            <div id="holder"></div>

            <p class="hidden" id="upload"><label>Drag & drop not supported, but
            you can still upload via this input field:<br>
            <input type="file"></label></p>

            <p id="filereader"></p>

            <p id="formdata"></p>

            <p id="progress"></p>

          <progress id="uploadprogress" max="100" value=
            "0">0</progress>
<script src="./js/fileupload.js"></script> 
        </article>
        <footer>
            
            
        </footer></a>
    </section>
</body>
</html>