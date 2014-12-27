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
    UILabel  *label;
    UITableView *tbl;
    NSMutableDictionary *tableData;
    UIRefreshControl *refreshControl;
}

@end

@implementation ViewController

- (void)viewDidLoad {
    [super viewDidLoad];
    
    [[NSNotificationCenter defaultCenter] addObserver:self selector:@selector(ActivateDownload) name:@"activatedDownload" object:nil];
    [[NSNotificationCenter defaultCenter] addObserver:self selector:@selector(deActivateDownload) name:@"deactivatedDownload" object:nil];
    tableData = [[NSMutableDictionary alloc] init];
    
    // Switch
    myRecive = [[GetData alloc] init];
    myRecive.center = CGPointMake(screenRect.size.width/2, screenRect.size.height/2);
    [self.view addSubview:myRecive];
    
    
    // Text View
    label = [[UILabel alloc] init];
    label.text = @"Get info from this vñue?";
    [self.view addSubview:label];
    [label sizeToFit];
    
    tableData[@"blackColor"] = [UIColor blackColor];
    tableData[@"blueColor"] = [UIColor blueColor];
    tableData[@"redColor"] = [UIColor redColor];
    tableData[@"greenColor"] = [UIColor greenColor];
     refreshControl = [[UIRefreshControl alloc] init];
    [refreshControl addTarget:self action:@selector(handleRefresh) forControlEvents:UIControlEventValueChanged];

    tbl = [[UITableView alloc] initWithFrame:CGRectMake(0, 60, screenRect.size.width, screenRect.size.height-23)];
    [tbl setDataSource:self];
    [tbl setDelegate:self];
    [tbl setHidden:YES];
    [tbl addSubview:refreshControl];
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
    [self.view addSubview:tbl];

    myRecive.layer.zPosition = 1;
    myRecive.frame = CGRectMake(10, 30, 200, 200);
    label.text = @"Some Event";
    [label sizeToFit];

    label.frame = CGRectMake((screenRect.size.width/2)-(label.frame.size.width/2), 20, label.frame.size.width, label.frame.size.height);

    label.layer.zPosition = 1;
    [tbl setHidden:NO];

    
}

-(void) deActivateDownload{
    [self.view setBackgroundColor:[UIColor whiteColor]];
    label.textColor = [UIColor blackColor];
    myRecive.center =  CGPointMake(screenRect.size.width/2, screenRect.size.height/2);
//    label.hidden = NO;
    
    label.text = @"Turn on to recive";
    [label sizeToFit];

    label.frame = CGRectMake((screenRect.size.width/2)-(label.frame.size.width/2), screenRect.size.height/2-100, label.frame.size.width, label.frame.size.height);
    [tbl setHidden:YES];

}


#pragma tableview
- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section{
    return [tableData count];
}

- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath{
    static NSString *CellIdentifier = @"Cell";
    
    UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    if (cell == nil) {
        cell = [[UITableViewCell alloc] initWithStyle:UITableViewCellStyleDefault reuseIdentifier:CellIdentifier];
    }
    
    NSString *str = [[tableData allKeys] objectAtIndex:(int)indexPath.row];
    cell.textLabel.text = str;
    cell.backgroundColor = tbl.backgroundColor;
    cell.accessoryType = UITableViewCellAccessoryDisclosureIndicator;

     return cell;
}

- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath
{
    BandDetailedViewController *bvc = [[BandDetailedViewController alloc] initWithNibName:nil bundle:nil withData:[tableData objectForKey:[[tableData allKeys] objectAtIndex:(int)indexPath.row]]];
    
    [self presentViewController:bvc animated:YES completion:nil];

    
}

-(void) handleRefresh{
    [PFCloud callFunctionInBackground:@"isInVenue"
                       withParameters:@{@"lat": [[LocationManager sharedManager] getLatitude], @"lon": [[LocationManager sharedManager] getLongitude]}
                                block:^(NSArray *results, NSError *error) {
                                    if (!error) {
                                        label.text = @"";
                                        [tableData removeAllObjects];
                                        NSMutableArray *bandIDS = [[NSMutableArray alloc] init];
                                        for (NSString *str in results) {
                                            PFObject *tmpObj = (PFObject *) str;
                                            NSString *eventName = [tmpObj objectForKey:@"EventName"];
                                            label.text = [NSString stringWithFormat:@"%@ %@", eventName, label.text];
                                            [label sizeToFit];
                                            [bandIDS addObject:[tmpObj objectForKey:@"Bands"]];
                                        }
                                        bandIDS = [[bandIDS valueForKeyPath: @"@unionOfArrays.self"] copy];
                                        NSLog(@" bandIDS %@", bandIDS);

                                        [PFCloud callFunctionInBackground:@"getBands" withParameters:@{@"idSet":bandIDS} block:^(NSArray *result2, NSError *error){
                                            for (NSString *str in result2) {
                                                PFObject *tmpObj = (PFObject *) str;
                                                NSString *bandName = [tmpObj objectForKey:@"BandName"];
                                                tableData[bandName] = tmpObj;
                                                NSLog(@"%@",bandName);
                                            }
                                            [tbl reloadData];
                                            [refreshControl endRefreshing];
                                        }];
                                      

                                        
                                    }
                                }];

   
}



@end
