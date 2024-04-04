import React from 'react';
import ReactDOM from 'react-dom';
import ChatBox from './ChatBox.jsx';

if (document.getElementById('main')) {
    const rootUrl = "http://127.0.0.1:8000";

    // Use ReactDOM.createRoot para renderizar seu componente
    ReactDOM.createRoot(document.getElementById('main')).render(
        <React.StrictMode>
            <ChatBox rootUrl={rootUrl}/>
        </React.StrictMode>
    );
}
