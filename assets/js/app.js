import'../css/app.scss';

import { Dropdown } from 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    enableDropDowns();
})

const enableDropDowns = () => {
    const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
    dropdownElementList.map(dropdownToggleEl => new Dropdown(dropdownToggleEl));
}
