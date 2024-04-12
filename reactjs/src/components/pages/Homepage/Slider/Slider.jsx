import "./Slider.css"
export default function Slider() {
    return (
        <div id="slider">
            <div className="container">
                <div className="row">
                    <div className="col-sm-5 mt-5 pl-38">
                        <p className="slider_title">Body control becomes easy with <span>FlexFit.</span></p>
                        <p>Provide a workout regimen with nutritious meals by using FlexFit to explore our exciting features</p>
                        <button className="btn">Get Started</button>
                    </div>
                    <div className="col-sm-7 center">
                        <div className>
                            <img src="http://localhost/BE/public/images/Image1.jpg" alt={8888} className="img-slider" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}