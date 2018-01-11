import React, { Component } from 'react';
import { getTextJoined } from './util/helper'

import Menu from './components/Menu';
import IntroCard from './components/IntroCard';
import ContactInfo from './components/ContactInfo';
import Footer from './components/Footer';
import Resume from './components/Resume/Resume';
import Briefcase from './components/Resume/Briefcase';

import myDataES from './initialStateES'
import myDataEN from './initialStateEN'

const languageManager = {
    SPANISH: {
        name: 'Español',
        flagIcon: 'http://icons.iconarchive.com/icons/pan-tera/flags/32/Mexico-Flag-icon.png'
    },
    ENGLISH: {
        name: 'English',
        flagIcon: 'http://icons.iconarchive.com/icons/pan-tera/flags/32/USA-Flag-icon.png'
    }
}

export default class App extends Component {
    constructor() {
        super();
        this.appVersion = '1.0.0';
        this.state = {
            data: myDataES,
            activeLanguage: languageManager.SPANISH
        }
    }

    changeLanguage() {
        if(this.state.activeLanguage === languageManager.SPANISH) {
            this.setEnglish();
        } else if(this.state.activeLanguage === languageManager.ENGLISH) {
            this.setSpanish();
        }
    }

    setSpanish() {
        this.setState({
            data: myDataES,
            activeLanguage: languageManager.SPANISH
        });
    }

    setEnglish() {
        this.setState({
            data: myDataEN,
            activeLanguage: languageManager.ENGLISH
        });
    }

    render() {
        return (
            <div>
                <Menu
                    changeLanguage={this.changeLanguage.bind(this)}
                    availableLanguage={
                        (this.state.activeLanguage === languageManager.SPANISH)
                            ? languageManager.ENGLISH
                            : languageManager.SPANISH
                    }
                    sections={this.state.data.sections}
                    contactInfo={this.state.data.contactInfo} />
                <IntroCard
                    name={this.state.data.name}
                    mainHeader={this.state.data.mainHeader}
                    subHeader={this.state.data.subHeader}
                    contactInfo={this.state.data.contactInfo}
                    welcome={this.state.data.sections.welcome}
                    resumePath={this.state.data.resumePath} />
                <Resume
                    career={this.state.data.sections.career}
                    education={this.state.data.sections.education}
                    profession={this.state.data.sections.professionalExperience}
                    certificates={this.state.data.sections.certificates}
                    knowledge={this.state.data.sections.knowledge} />
                <Briefcase
                    briefcase={this.state.data.sections.briefcase} />
                <ContactInfo
                    contactInfo={this.state.data.contactInfo} />
                <Footer
                    legalUrl={this.state.data.legalUrl}
                    legalLabel={this.state.data.legalLabel} />
            </div>
        );
    }
}
