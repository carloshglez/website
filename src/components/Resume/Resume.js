import React from 'react';
import SummaryInfo from './SummaryInfo'
import EducationInfo from './EducationInfo'
import JobsInfo from './JobsInfo'
import CertificationInfo from './CertificationInfo'
import SkillsInfo from './SkillsInfo'

export default class Resume extends React.Component {
    render() {
        return (
            <section id="resume" className="employment_and_edu_block">
                <div className="container">
                    <SummaryInfo career={this.props.career}/>

                    <div className="row">
                        <EducationInfo education={this.props.education}/>
                        <JobsInfo profession={this.props.profession}/>
                        <CertificationInfo certificates={this.props.certificates}/>
                    </div>

                    <SkillsInfo knowledge={this.props.knowledge}/>
                </div>
            </section>
        );
    }
}
