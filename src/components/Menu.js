import React from 'react';

export default class Menu extends React.Component {
    render() {
        return (
            <section id="menu" className="menu">
                <div className="menu__wrapper   container">
                    <div className="row">
                        <div className="menu-collapsed">
                            <div className="bar visible-xs"></div>
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#" onClick={this.props.changeLanguage}>
                                            <img alt={this.props.availableLanguage.name} src={this.props.availableLanguage.flagIcon}/>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#hello">{this.props.sections.welcome.title}</a>
                                    </li>
                                    <li>
                                        <a href="#resume">{this.props.sections.career.title}</a>
                                    </li>
                                    <li>
                                        <a href="#experiencia">{this.props.sections.professionalExperience.title}</a>
                                    </li>
                                    <li>
                                        <a href="#cursos">{this.props.sections.certificates.title}</a>
                                    </li>
                                    <li>
                                        <a href="#habcon">{this.props.sections.knowledge.title}</a>
                                    </li>
                                    <li>
                                        <a href="#portfolio">{this.props.sections.briefcase.title}</a>
                                    </li>
                                    <li>
                                        <a href="#contacts">{this.props.contactInfo.title}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
        );
    }
}
