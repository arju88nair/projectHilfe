import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import ProfileBanner from '../components/ProfileBanner'

import { createStore, applyMiddleware } from 'redux'
import { Provider } from 'react-redux'
import thunk from 'redux-thunk'
import { createLogger } from 'redux-logger'
import reducer from '../reducers'

const middleware = [ thunk ]
if (process.env.NODE_ENV !== 'production') {
    middleware.push(createLogger())
}

const store = createStore(
    reducer,
    applyMiddleware(...middleware)
)


        /* The if statement is required so as to Render the component on pages that have a div with an ID of "root";
        */

    if (document.getElementById('profile')) {
        ReactDOM.render(
            <Provider store={store}>
                <ProfileBanner/>
            </Provider>
            , document.getElementById('profile'));
    }