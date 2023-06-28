/* eslint-disable no-unused-vars */
import React, { useState } from 'react'
import { MapContainer, TileLayer, Marker, Popup } from 'react-leaflet';


function App() {
  const [locationEntered, setLocationEntered] = useState('Lagos')
  const [loading, setLoading] = useState(false)
  const [coords, setCoords] = useState({
    lat: 6.5243793,
    lng: 3.3792057
  })


  const handleFormSubmit = async (e) => {
    e.preventDefault();

    if (!locationEntered.trim()) {
      alert('Please enter a location');
      return;
    }

    setLoading(true);
    setCoords({
      lat: 0,
      lng: 0
    })

    try {
      const response = await fetch("https://100074.pythonanywhere.com/get-coords/", {
        method: 'POST',
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({ region: locationEntered }),
        redirect: 'follow'
      });

      if (!response.ok) {
        throw new Error('Failed to fetch coordinates');
      }

      const result = await response.json();
      if (result.error) {
        alert(result.error);
      } else {
        const { Coords } = result;
        setCoords({
          lat: Coords.lat,
          lng: Coords.lng
        });
      }
    } catch (error) {
      console.log('error', error);
      alert('An error occurred while fetching coordinates. Please try again.');
    } finally {
      setLoading(false);
    }
  };


  return (
    <>
      <nav className="navbar bg-body-tertiary">
        <div className="container-fluid">
          <a className="navbar-brand">Coordinates App</a>
          <form className="d-flex" role="search" onSubmit={handleFormSubmit}>
            <input
              disabled={loading}
              required
              className="form-control me-2"
              type="search" placeholder="Search"
              aria-label="Search"
              onChange={(e) => setLocationEntered(e.target.value)}
            />
            <button className="btn btn-outline-success"
              disabled={loading}
              type="submit">{loading ? "Please wait..." : "Search"}</button>
          </form>
        </div>
      </nav>

      <div id='map-container'>
        <div className='p-5'>
          {coords.lat && coords.lng ? (
            <h1 className="text-center">
              Current Displaying: <br />
              Latitude: {coords.lat}, Longitude: {coords.lng}
            </h1>
          ) : loading ? <div className="spinner-border" role="status">
            <span className="visually-hidden">Loading...</span>
          </div> : null}
        </div>


        {coords.lat && coords.lng && (
          <MapContainer
            center={[coords.lat, coords.lng]}
            zoom={10}
            scrollWheelZoom={false}
          >
            <TileLayer
              attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
            />
            <Marker position={[coords.lat, coords.lng]}>
              <Popup>
                A pretty CSS3 popup. <br /> Easily customizable.
              </Popup>
            </Marker>
          </MapContainer>
        )}

      </div>
    </>
  )
}

export default App
