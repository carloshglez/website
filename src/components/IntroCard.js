import React from 'react';
import { getTextJoined, isMobileDevice } from '../util/helper'

export default class IntroCard extends React.Component {
    render() {
        const textColor = {
            color: isMobileDevice() ? '#412c77' : 'white'
        };

        return (
            <section id="front" className="front">
                <div className="container">
                    <div className="card   row">
                        <div className="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-1 col-md-3 col-md-offset-2">
                            <div className="row">
                                <img className="front__image img-responsive" src="karinacortes.com/img/profile3.jpg"
                                    alt="" />
                            </div>
                        </div>
                        <div className="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-1 col-md-5 col-md-offset-1">
                            <div className="row">
                                <h1>
                                    <strong>{this.props.name}</strong>
                                </h1>
                                <p id="testimonials_header" className="text-muted">{this.props.mainHeader}</p>
                                <p className="text-muted"><b>{this.props.subHeader}</b></p>
                            </div>
                            <hr />
                            <div className="row social_icons">
                                <ul className="list-inline">
                                    <li className="no_paddings">
                                        <a href={this.props.contactInfo.phoneLink} target="_blank">
                                            <i className="fa fa-phone fa-2x" aria-hidden="true" title={this.props.contactInfo.phone}></i>
                                        </a>
                                    </li>
                                    <li className="no_paddings">
                                        <a href={this.props.contactInfo.emailLink} target="_blank">
                                            <i className="fa fa-envelope fa-2x" aria-hidden="true" title={this.props.contactInfo.email}></i>
                                        </a>
                                    </li>
                                    <li className="no_paddings">
                                        <a href={this.props.contactInfo.linkedin} target="_blank">
                                            <i className="fa fa-linkedin fa-2x" aria-hidden="true" title={this.props.contactInfo.skype}></i>
                                        </a>
                                    </li>
                                    <li className="no_paddings">
                                        <a href={this.props.contactInfo.skypeLink} target="_blank">
                                            <i className="fa fa-skype fa-2x" aria-hidden="true" title={this.props.contactInfo.skype}></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div className="row">
                        <div id="hello" className="col-xs-10 col-xs-offset-1 intro_text">
                            <h2 id="hello_header" style={textColor}>{this.props.welcome.title}</h2>
                            <div className="row">
                                <p style={textColor}>{getTextJoined(this.props.welcome.content)}</p>
                                <div className="download_cv_block">
                                    <a href={this.props.contactInfo.resumePath} className="btn btn-primary" target="_blank">
                                        <i className="fa fa-file-text-o fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;{this.props.contactInfo.resumeDownloadLabel}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        );
    }
}
