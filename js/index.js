(function() {
  window.location.hash = '';
  var lightbox = document.getElementById('lightbox');
  lightbox.onclick = function(e) {
    if (e.target === lightbox) {
      window.location.hash = '';
    }
  };
  var lightboxImg = document.querySelector('#lightbox img');
  var lightboxVideo = document.querySelector('#lightbox video');
  var gallery = document.getElementById('gallery');
  gallery.onclick = function(e) {
    lightboxImg.style.display = 'none';
    lightboxVideo.style.display = 'none';
    if (e.target.nodeName === 'IMG') {
      lightboxImg.src = e.target.src;
      lightboxImg.style.display = 'inline-block';
      window.location.hash = '#lightbox';
      e.preventDefault();
    } else if (e.target.nodeName === 'VIDEO') {
      lightboxVideo.innerHTML = e.target.innerHTML;
      lightboxVideo.style.display = 'inline-block';
      window.location.hash = '#lightbox';
      e.preventDefault();
    } else {
      lightboxVideo.pause();
    }
  };
  var email = document.getElementById('email');
  email.onclick = function() {
    var val = prompt('Where to send?');
    if (val) {
        fetch("index.php", {
          method: "post",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded"
          },

          body: 'email=' + encodeURIComponent(val) + '&pic=' + encodeURIComponent(lightboxImg.src)
        }).then(function(response) {
          return response.text();
        }).then(function(text) {
          alert(text);
        });
    }
  }
})();