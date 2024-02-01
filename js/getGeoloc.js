
// Function to handle button click
function geolocActivate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(sendLocation);
  } else {
    console.log('Geolocation is not supported by your browser.');
  }
}

// Function to send location data to the server
function sendLocation(position) {
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;
  const jsonData = {
    latitude: latitude,
    longitude: longitude
  };

  fetch('save_json.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(jsonData)
  })
    .then(response => {
      if (response.ok) {
        console.log(jsonData+' '+'Location data sent successfully');
      } else {
        console.log('Failed to send location data');
      }
    })
    .catch(error => {
      console.log('Error:', error);
    });
}

// Attach the event listener to the button
const buttonElement = document.getElementById('location-button');
buttonElement.addEventListener('click', handleButtonClick);
