import Navigator from './components/navigator.js';
import Popup from './components/popup.js';

const Components = [
    Navigator,
    Popup,
];

Components.forEach((component) => {
    component.init();
})

const App = {
    popup: Popup,
}

export { App };