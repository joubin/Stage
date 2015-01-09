//
//  ViewController.m
//  Stage
//
//  Created by Joubin Jabbari on 12/20/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "ViewController.h"

@interface ViewController (){
    GetData *myRecive;
}

@end

@implementation ViewController

- (instancetype)init
{
    self = [super init];
    if (self) {
        [self.view setBackgroundColor:[UIColor whiteColor]];
    }
    return self;
}
- (void)viewDidLoad {
    [super viewDidLoad];

    [[NSNotificationCenter defaultCenter] addObserver:self selector:@selector(ActivateDownload) name:@"activatedDownload" object:nil];
    [[NSNotificationCenter defaultCenter] addObserver:self selector:@selector(deActivateDownload) name:@"deactivatedDownload" object:nil];
    
    // Switch
    myRecive = [[GetData alloc] init];
    myRecive.center = CGPointMake(screenRect.size.width/2, screenRect.size.height/2);
    [self.view addSubview:myRecive];
    
    
    // Text View

       

    // Do any additional setup after loading the view, typically from a nib.
    
}

-(void) viewDidAppear:(BOOL)animated{
    [super viewDidAppear:animated];
}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}


-(void) viewDidLayoutSubviews{
//    myRecive.center =  CGPointMake(screenRect.size.width/2, screenRect.size.height/2);
//    label.center =  CGPointMake(screenRect.size.width/2, (screenRect.size.height/2)-35);
}


-(void) ActivateDownload{
//    [self.view setBackgroundColor:[UIColor blackColor]];
//    label.textColor = [UIColor whiteColor];
//    label.hidden = YES;


    


    
}

-(void) deActivateDownload{
    
}


@end
