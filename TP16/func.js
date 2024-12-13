const hello=()  => {console.log('Hello');};
const ok =  ()  => {console.log('Ok');   };
const bye = ()  => {console.log('Bye');  };

const aCall = (callback) => {
    const maxTime = 10000;
    setTimeout(callback,  Math.random() * maxTime);
};

const aHello = () => { aCall(hello); };
const aOk    = () => { aCall(ok);    };
const aBye   = () => { aCall(bye);   };

const main = () => {
    aHello(); aOk(); aBye();
};

main();