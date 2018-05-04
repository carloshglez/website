import React from 'react';
import { splitSkillsArray } from '../../util/helper'

export default class SkillsInfo extends React.Component {
    render() {
        let topics = this.props.knowledge.topics;
        let skillBlocks = topics.map(function (item, index) {
            let tools = item.tools;
            tools.sort(function(a, b){return b.level-a.level});

            let sortedTools = item.tools.map(function (subItem, subIndex) {
                return (
                    <div className="progress_skill" key={subIndex}>
                        <div>
                            <p>
                                <span className="skill_item">{subItem.name}</span>
                                <span className="skill_value">{subItem.level}%</span>
                            </p>
                        </div>
                        <div>
                            <div className="progress">
                                <div className="progress-bar" role="progressbar" aria-valuenow={subItem.level} aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>

                )
            });
            let newSortedTools = splitSkillsArray(sortedTools);

            return (
                <div className="skill-set row   js-skill-set" key={index} style={{marginTop: 40}}>
                    <h3 id="habcon" className="skill-set__header">{item.title}</h3>
                    <div className="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-1">
                        {newSortedTools[0]}
                    </div>
                    <div className="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-1" style={{marginLeft: 30}}>
                        {newSortedTools[1]}
                    </div>
                </div>
            )
        });

        return (
            <div>
                {skillBlocks}
            </div>
        );
    }
}



