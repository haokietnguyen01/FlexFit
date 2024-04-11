import Header from "./components/layout/Header/Header"; 
import Footer from "./components/layout/Footer/Footer";
import { useLocation } from "react-router-dom";
function App(props) {
  let params1 = useLocation();
  function render() {
    if (params1['pathname'].includes("service")) {
      return (
        <div>
          {props.children}
        </div>
      )
    }else if(params1['pathname'].includes("private")){
      return (
        <div>
          {props.children}
        </div>
      )
    }else if(params1['pathname'].includes("public")){
      return (
        <div>
          {props.children}
        </div>
      )
    }
    else {
      return(
        <div>
          <Header/>
            <div>
              {props.children}
            </div>
          <Footer/>
        </div>
      )
    }

  }
  return(
    <div>
      {render()}
    </div>
  )
}

export default App;
