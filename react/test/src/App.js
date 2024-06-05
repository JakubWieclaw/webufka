import React, { useState } from 'react';
import ToDoList from './components/ToDoList';
import NewTask from './components/NewTask';

const App = () => {
  const [tasks, setTasks] = useState([]);
  const [hideCompleted, setHideCompleted] = useState(false);

  const addTask = content => {
    const newTask = { id: Date.now(), content, completed: false };
    setTasks(prevTasks => [...prevTasks, newTask]);
  };

  const toggleTask = taskId => {
    setTasks(prevTasks =>
      prevTasks.map(task =>
        task.id === taskId ? { ...task, completed: !task.completed } : task
      )
    );
  };

  const filteredTasks = hideCompleted ? tasks.filter(task => !task.completed) : tasks;

  return (
    <div>
      <h1>Lista zadań</h1>
      <NewTask addTask={addTask} />
      <ToDoList tasks={filteredTasks} toggleTask={toggleTask} />
      <label>
        <input
          type="checkbox"
          checked={hideCompleted}
          onChange={() => setHideCompleted(!hideCompleted)}
        />
        Ukryj ukończone zadania
      </label>
    </div>
  );
};

export default App;
