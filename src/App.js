import React, { Component } from 'react';
import { getTextJoined } from './util/helper'

import Menu from './components/Menu';
import IntroCard from './components/IntroCard';
import ContactInfo from './components/ContactInfo';
import Footer from './components/Footer';
import Resume from './components/Resume/Resume';
import Briefcase from './components/Resume/Briefcase';


export default class App extends Component {
    constructor(props) {
        super(props);
        this.appVersion = '1.0.0';
        this.state = props.initialState;

        this.sections = this.state.sections;
        this.welcome = this.sections.welcome;

        this.career = this.sections.career;
        this.education = this.sections.education;
        this.profession = this.sections.professionalExperience;
        this.certificates = this.sections.certificates;
        this.knowledge = this.sections.knowledge;
        this.briefcase = this.sections.briefcase;
    }

    render() {
        return (
            <div>
                <Menu
                    sections={this.sections}
                    contactInfo={this.state.contactInfo} />
                <IntroCard
                    name={this.state.name}
                    mainHeader={this.state.mainHeader}
                    subHeader={this.state.subHeader}
                    contactInfo={this.state.contactInfo}
                    welcome={this.welcome}
                    resumePath={this.state.resumePath} />
                <Resume
                    career={this.career}
                    education={this.education}
                    profession={this.profession}
                    certificates={this.certificates}
                    knowledge={this.knowledge} />
                <Briefcase
                    briefcase={this.briefcase} />
                <ContactInfo
                    contactInfo={this.state.contactInfo} />
                <Footer
                    legalUrl={this.state.legalUrl}
                    legalLabel={this.state.legalLabel} />
            </div>
        );
    }
}
