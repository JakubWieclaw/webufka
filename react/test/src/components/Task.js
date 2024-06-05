import React from 'react';

const Task = ({ task, toggleTask }) => {
    return (
        <div>
            <input
                type="checkbox"
                checked={task.completed}
                onChange={() => toggleTask(task.id)}
            />
            <span>{task.content}</span>
        </div>
    );
};

export default Task;
