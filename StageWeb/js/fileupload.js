var holder = document.getElementById('holder'),
    tests = {
      filereader: typeof FileReader != 'undefined',
      dnd: 'draggable' in document.createElement('span'),
      formdata: !!window.FormData,
      progress: "upload" in new XMLHttpRequest
    }, 
    support = {
      filereader: document.getElementById('filereader'),
      formdata: document.getElementById('formdata'),
      progress: document.getElementById('progress')
    },
    acceptedTypes = {
      'image/png': true,
      'image/jpeg': true,
      'image/gif': true
    },
    progress = document.getElementById('uploadprogress'),
    fileupload = document.getElementById('upload');

"filereader formdata progress".split(' ').forEach(function (api) {
  if (tests[api] === false) {
    support[api].className = 'fail';
  } else {
    // FFS. I could have done el.hidden = true, but IE doesn't support
    // hidden, so I tried to create a polyfill that would extend the
    // Element.prototype, but then IE10 doesn't even give me access
    // to the Element object. Brilliant.
    support[api].className = 'hidden';
  }
});

function previewfile(file) {
  while (holder.firstChild) {
    holder.removeChild(holder.firstChild);
}
  if (tests.filereader === true && acceptedTypes[file.type] === true) {
    var reader = new FileReader();
    reader.onload = function (event) {
      var image = new Image();
      image.src = event.target.result;
      image.width = 750; // a fake resize
      image.className = image.className+" img-rounded fitinside"
      holder.appendChild(image);
    };

    reader.readAsDataURL(file);
  }  else {
    holder.innerHTML += '<p>Uploaded ' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K' : '');
    console.log(file);
  }
}

function readfiles(files) {
    var formData = tests.formdata ? new FormData() : null;
      if (tests.formdata) formData.append('myfile', files[0]);
      previewfile(files[0]);
    

    // now post a new XHR request
    if (tests.formdata) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'getcurrentuser.php');
      xhr.onload = function() {
        progress.value = progress.innerHTML = 100;
        document.getElementById('uploadprogress').style.display = 'none';

      };
      // debugger;
      if (tests.progress) {
        xhr.upload.onprogress = function (event) {
          if (event.lengthComputable) {
            var complete = (event.loaded / event.total * 100 | 0);
            progress.value = progress.innerHTML = complete;
          }
        }
      }

      xhr.send(formData);
      xhr.onreadystatechange = function() {
      if (xhr.readyState == 4) {
        if (xhr.responseText.indexOf("Your image did not follow") > -1) {
                  alert(xhr.responseText+" ");
                  location.reload();


        };
    }
}    }
}

if (tests.dnd) { 
  holder.ondragover = function () { this.className = 'hover'; return false; };
  holder.ondragend = function () { this.className = ''; return false; };
  holder.ondrop = function (e) {
     var changeIt = document.getElementById('uploadprogress');
    changeIt.style.display = 'block';
    changeIt.className = changeIt.className+" informatiemelding";
      changeIt.hidden = false;

    this.className = '';
    e.preventDefault();
    readfiles(e.dataTransfer.files);
  }
} else {
     var changeIt = document.getElementById('uploadprogress');
    changeIt.style.display = 'block';
    changeIt.className = changeIt.className+" informatiemelding";
    changeIt.hidden = false;
  fileupload.className = 'hidden';
  fileupload.querySelector('input').onchange = function () {
    readfiles(this.files);
  };
}