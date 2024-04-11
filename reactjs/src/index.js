import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';
import{
  BrowserRouter as Router,
  Routes,
  Route,
} from "react-router-dom";
import Home from './components/pages/Homepage/Home';
import Register from './components/pages/Register/Register';
import Login from './components/pages/Login/Login';
import LoginAdmin from './components/Admin/Login/LoginAdmin';
import Meal from './components/Admin/Meals/Meal';
import Exercise from './components/Admin/Exercise/Exercise';
import User from './components/Admin/User/User';
import Payment from './components/Admin/Payment/Payment';
import Listcoaches from './components/pages/List_coaches/Listcoaches';
import ChangePassword from './components/pages/Information/Changepassword/Changepassword';
import EditInformation from './components/pages/Information/EditInformation';
import DisableAccount from './components/pages/Information/DisableAccount/DisableAccount';
const HtmlPage = () => {
  return (
    <iframe src="http://127.0.0.1:5500/reactjs/src/components/Body/index.html" title="Your Page"></iframe>
  );
};

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <Router>
      <App>
        <Routes>
          <Route index path="/" element={<Home/>}></Route>
          {/* Customer */}
          <Route path="/user/public/register" element={<Register/>}> </Route>
          <Route path="/user/service/body" element={<HtmlPage/>}> </Route>
          <Route path="/user/public/login" element={<Login/>}> </Route>
          <Route path="/user/list_coaches" element={<Listcoaches/>}> </Route>
          <Route path="/user/edit_information" element={<EditInformation/>}> </Route>
          <Route path="/user/changepassword" element={<ChangePassword/>}> </Route>
          <Route path="/user/disableaccount" element={<DisableAccount/>}> </Route>
          {/* Admin */}
          <Route path="/admin/private/login" element={<LoginAdmin/>}> </Route>
          <Route path="/admin/meal" element={<Meal/>}> </Route>
          <Route path="/admin/exercise" element={<Exercise/>}> </Route>
          <Route path="/admin/user" element={<User/>}> </Route>
          <Route path="/admin/payment" element={<Payment/>}> </Route>
        </Routes>
      </App>
    </Router>
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
