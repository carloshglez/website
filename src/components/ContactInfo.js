import React from 'react';

export default class ContactInfo extends React.Component {
    render() {
        return (
            <section id="contacts" className="contacts_block">
                <div className="container">
                    <h2 id="contacts_header" className="text-center header_color_special">{this.props.contactInfo.title}</h2>
                    <div className="card">
                        <div className="reviews row">
                            <div className="contacts_links col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-1 col-md-4">
                                <div className="row">
                                    <div className="col-xs-7 col-sm-12">
                                        <dl className="dl-horizontal">
                                            <dt>
                                                <i className="fa fa-phone fa-2x" aria-hidden="true"></i>
                                            </dt>
                                            <dd>
                                                <a href={this.props.contactInfo.phoneLink} target="_blank">{this.props.contactInfo.phone}</a>
                                            </dd>
                                            <dt>
                                                <i className="fa fa-envelope fa-2x" aria-hidden="true"></i>
                                            </dt>
                                            <dd>
                                                <a href={this.props.contactInfo.emailLink} target="_blank">{this.props.contactInfo.email}</a>
                                            </dd>
                                            <dt>
                                                <i className="fa fa-linkedin fa-2x" aria-hidden="true"></i>
                                            </dt>
                                            <dd>
                                                <a href={this.props.contactInfo.linkedin} target="_blank">{this.props.contactInfo.skype}</a>
                                            </dd>
                                            <dt>
                                                <i className="fa fa-skype fa-2x" aria-hidden="true"></i>
                                            </dt>
                                            <dd>
                                                <a href={this.props.contactInfo.skypeLink} target="_blank">{this.props.contactInfo.skype}</a>
                                            </dd>
                                            <hr />
                                            <dt>
                                                <i className="fa fa-plane fa-2x" aria-hidden="true"></i>
                                            </dt>
                                            <dd>
                                                <h6>{this.props.contactInfo.extraInfo}</h6>
                                            </dd>
                                        </dl>
                                    </div>
                                    <div className="col-xs-5 col-sm-12 social_links">
                                        <ul className="list-unstyled text-xs-right text-sm-left">
                                            <li>
                                                <br />
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div className="contact_form contact_form col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-0 col-md-5 col-md-offset-1">
                                <div className="row">
                                    <h3>{this.props.contactInfo.contactForm.title}</h3>
                                </div>
                                <div className="row">
                                    <form id="contact-form" className="form-horizontal" data-toggle="validator" data-disable="false">
                                        <div className="form-group">
                                            <div className="col-xs-12">
                                                <input type="text" id="name-input" name="name" className="form-control" required
                                                    placeholder={this.props.contactInfo.contactForm.namePlaceholder}
                                                    data-error={this.props.contactInfo.contactForm.nameError} />
                                                <div className="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div className="form-group">
                                            <div className="col-xs-12">
                                                <input type="email" id="email-input" name="e-mail" className="form-control" required
                                                    placeholder={this.props.contactInfo.contactForm.emailPlaceholder}
                                                    data-error={this.props.contactInfo.contactForm.emailError}
                                                    data-required-error={this.props.contactInfo.contactForm.emailRequiredError} />
                                                <div className="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div className="form-group">
                                            <div className="col-xs-12">
                                                <textarea className="form-control" id="message-input" name="message" rows="4" required
                                                    placeholder={this.props.contactInfo.contactForm.messagePlaceholder}
                                                    data-error={this.props.contactInfo.contactForm.messageError}></textarea>
                                                <div className="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div className="form-group">
                                            <div className="col-xs-12">
                                                <input type="submit" className="btn btn-primary btn-block" value={this.props.contactInfo.contactForm.buttonLabel} />
                                            <div id="form-submit-errors" className="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        );
    }
}
