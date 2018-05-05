Webcam.set({
    width: 320,
    height: 240,
    image_format: 'jpeg',
    jpeg_quality: 90
  });
  Webcam.attach('#my_camera');
  
  var canvas = document.getElementById('viewport'),
    context = canvas.getContext('2d');
  
  function take_snapshot() {
    // take snapshot and get image data
    Webcam.snap(function(data_uri) {
      base_image = new Image();
      base_image.src = data_uri;
      base_image.onload = function() {
        context.drawImage(base_image, 0, 0, 320, 240);
  
        let data = canvas.toDataURL('image/jpeg');
  
        fetch(data)
          .then(res => res.blob())
          .then(blobData => {
            $.post({
                url: "https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect",
                contentType: "application/octet-stream",
                headers: {
                  'Ocp-Apim-Subscription-Key': 'ea041bd96b1a4aa3a34b05ed8c962f02'
                },
                processData: false,
                data: blobData
              })
              .done(function(data) {
                $("#results").text(JSON.stringify(data));
  
              })
              .fail(function(err) {
                $("#results").text(JSON.stringify(err));
              })
          });
      }
    });
  };
  