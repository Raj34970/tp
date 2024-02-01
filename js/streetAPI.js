// Function to handle the input change
function handleInputChange(event) {
    // Get the user input
    const address = event.target.value.trim();
  
    // Encode the address for the URL
    const encodedAddress = encodeURIComponent(address);
  
    // Make a request to the OpenStreetMap API
    fetch(`https://nominatim.openstreetmap.org/search?q=${encodedAddress}&format=json`)
      .then(response => response.json())
      .then(data => {
        // Extract the address details from the response
        const addresses = data.map(result => ({
          address: result.display_name,
          lat: result.lat,
          lon: result.lon
        }));
  
        // Display the addresses in a list
        const listElement = document.getElementById('address-list');
        listElement.innerHTML = '';
  
        addresses.forEach(address => {
          const listItem = document.createElement('li');
          // Create an image element
          const image = document.createElement('img');
          image.src = '/trouverperdu/img/location.svg'; 
          image.alt = 'Address';
          image.style.width = '25px';

          listItem.appendChild(image);

          listItem.textContent = address.address;
          listItem.setAttribute('data-lat', address.lat);
          listItem.setAttribute('data-lon', address.lon);
          listItem.addEventListener('click', () => {
            inputElement.value = address.address;
            const jsonData = {
              address: address.address,
              latitude: address.lat,
              longitude: address.lon
            };
            sendJSONData(jsonData);
            listElement.innerHTML = '';
          });
          listElement.appendChild(listItem);
        });
      })
      .catch(error => {
        console.log('Error:', error);
      });
  }
  
  // Function to send JSON data to the server
  function sendJSONData(jsonData) {
    fetch('./php/save_streetAPI.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(jsonData)
    })
      .then(response => {
        if (response.ok) {
          console.log('JSON data sent successfully');
          console.log(jsonData)
        } else {
          console.log('Failed to send JSON data');
        }
      })
      .catch(error => {
        console.log('Error:', error);
      });
  }
  
  // Attach the event listener to the input field
  const inputElement = document.getElementById('address-input');
  inputElement.addEventListener('input', handleInputChange);
  